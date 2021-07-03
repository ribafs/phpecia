<?php
include_once("../classes/compras.php");
$crud = new Crud($pdo);

$stmt = $crud->pdo->prepare("SELECT COUNT(*) FROM compras");
$stmt->execute();
$rows = $stmt->fetch();

$totalPages = ceil($rows[0]/$conn->regsPerPage);

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    if ($_GET['alert'] == 'danger') $alert = 'alert-danger';
    if ($_GET['alert'] == 'success') $alert = 'alert-success';
    if(isset($_GET['data'])){
        $data = ': '.$_GET['data'];
    }else{
        $data = null;
    }
}else{
    $msg = NULL;
    $alert = null;
    $data = null;
}
?>

<?php require_once '../header.php';?>
<body>
<br/>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h1><?=$conn->appName?></h1><h3><?=$conn->currentDir()?></h3></div>
        <h2 align="center"><div class="<?=$alert?>"><?=$msg.''.$data?></div></h2>
            <!-- Adicionar registro -->
            <div class="text-left col-md-2 top">
                <a href="insert.php" class="btn btn-primary pull-left">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar
                </a>
            </div>

            <!-- Form de busca-->
            <div class="col-md-10">
                <form action="search.php" method="get" >
                  <div class="pull-right top">
                  <span class="pull-right">  
                    <label class="control-label" for="palavra" style="padding-right: 5px;">
                      <input type="text" value="" placeholder="Name ou parte" class="form-control" name="keyword">
                    </label>
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Busca</button>
                  </span>                 
                  </div>
                </form>
            </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID do Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Data da Compra</th>
                </tr>
            </thead>
            <tbody id="pg-results">
            </tbody>
        </table>
        <div class="panel-footer text-center">
            <div class="pagination"></div>
        </div>
    
<script src="../assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery.bootpag.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#pg-results").load("fetch_data.php");
    $(".pagination").bootpag({
        total: <?=$totalPages?>,
        page: 1,
        maxVisible: <?=$conn->linksPerPage?>,// links do rodapé da paginação    
        leaps: true,
        firstLastUse: true,
        first: 'Primeiro',//←
        last: 'Último',//→
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(e, page_num){
        //e.preventDefault();
        $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
        $("#pg-results").load("fetch_data.php", {"page": page_num});
    });
});
</script>

<?php require_once '../footer.php';?>
