Relação de scripts para agilizar as tarefas
nas tarefas mais frequentemente usadas

Para todos os que não requerem parâmetro uso um alias
Para os que precisam de parâmetro uso script com $1, $3, ...

ubin
sudo nano /usr/local/bin/ubin
sudo nano /usr/local/bin/$1
sudo chmod +x /usr/local/bin/ubin

umod
sudo nano /usr/local/bin/umod
sudo chmod +x /usr/local/bin/$1
sudo chmod +x /usr/local/bin/umod

# Usando o ubin para criar o umod
ubin umod

#Usando o umod para setar o chmod +x no ubin
umod ubin

Se não fossem estes scripts precisariamos fazer tudo isso acima

da - listar os maiores arquivos/diretórios de um diretório
ubin da
sudo du -a $1 | sort -n -r | head -n 20
umod da
# Exemplo: da /home/ribafs

l7
ubin l7
rm -rf $1
composer create-project laravel/laravel="7.*" $1
umod l7

l8
ubin l8
rm -rf $1
laravel new $1 --jet --stack=livewire
umod l8

paclear
ubin paclear
php artisan $1:clear
umod paclear
# paclear view, paclear route

ubin pa
php artisan make:$1 $3
umod pa
# pa model, pa ClientController, pa migration create_clients_table

# Como uso muito com meus pacotes
ubin cr
composer require ribafs/$1
umod cr

ubin crr
composer remove ribafs/$1
umod crr

gs - git sincronização do desktop com o remoto
ubin gs
git add .
git commit -m "$1"
git pull
git push
umod gs

ubin buscastr
# Procurar por uma string em todos os arquivos de um diretório e Retornar os nomes de todos os arquivos que contém
# $1 - pasta
# $2 - string
find $1 -type f -exec grep -l "$2" {} +
umod buscastr

Enviar os aliases para /etc/skel/.bashrc


