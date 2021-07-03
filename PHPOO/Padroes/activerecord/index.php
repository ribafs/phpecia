<?php

include "ActiveRecord.php";

// Conexão
$pdo = ActiveRecord::setDb(new PDO('mysql:host=localhost;dbname=testes', 'root', 'root'));

// Criar classe para a tabela
class Users extends ActiveRecord{
	public $table = 'users';
	public $primaryKey = 'id';
}

// Criando instância da classe users
$user = new Users();

// Insert
/*
    $user->login = 'demo2';
    $user->senha = md5('demo');
    $user->insert();
*/
// Consulta all
$users = $user->findAll();
foreach($users as $user){
//    print $user->login.' - '.$user->senha.'<br>';
}

//print_r($user->notnull('id')->orderby('id desc')->find());

// Consultando um registro
//$u=$user->select('id', 'login')->where('login="LKTSjftx"')->find();
//print_r($u->senha);exit;
//$user->where('id=1 AND name="demo"')->find();

// Limit
//$user->order('id desc', 'name asc')->limit(2,1);

//Update
    //$user->isnotnull()->eq('id', 1);
    $user->notnull('id')->orderby('id desc')->find()->id = 100;
    $user->login = 'testeUpd3';
    $user->update();

// Delete
//$u=$user->select('id', 'login')->where('id=102')->find()->delete();
exit;

// Join de user com contact
$user->join('contact', 'contact.user_id = user.id')->find();


/*
$user = new User();
$user->name = 'demo';
$user->password = md5('demo');
var_dump($user->insert());

    $user->select('count(1) as count')->groupby('name')->findAll();
    
#### order()/orderby()

    $user->orderby('name DESC')->find();
    
#### limit()

    $user->orderby('name DESC')->limit(0, 1)->find();

### WHERE conditions
#### equal()/eq()

    $user->eq('id', 1)->find();

#### notequal()/ne()

    $user->ne('id', 1)->find();
    
#### greaterthan()/gt()

    $user->gt('id', 1)->find();

#### lessthan()/lt()

    $user->lt('id', 1)->find();

#### greaterthanorequal()/ge()/gte()

    $user->ge('id', 1)->find();

#### lessthanorequal()/le()/lte()

    $user->le('id', 1)->find();

#### like()

    $user->like('name', 'de')->find();

#### in()

    $user->in('id', [1, 2])->find();

#### notin()

    $user->notin('id', [1,3])->find();

#### isnull()

    $user->isnull('id')->find();

#### isnotnull()/notnull()

    $user->isnotnull('id')->find();

## Install

    composer require bephp/activerecord 

ActiveRecord::setDb(new PDO('sqlite:test.db'));
ActiveRecord::execute("CREATE TABLE IF NOT EXISTS user (
                                id INTEGER PRIMARY KEY, 
                                name TEXT, 
                                password TEXT 
                        );");
ActiveRecord::execute("CREATE TABLE IF NOT EXISTS contact (
                                id INTEGER PRIMARY KEY, 
                                user_id INTEGER, 
                                email TEXT,
                                address TEXT
                        );");
*/
