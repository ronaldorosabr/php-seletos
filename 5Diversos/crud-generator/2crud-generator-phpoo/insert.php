<?php
require_once('./header.php');
require_once('./classes/crud.php');

if(isset($_REQUEST['table'])){
    $table = $_REQUEST['table'];
}
$crud = new Crud($pdo,$table);
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?></b> <br>(Adicionar)</h3></div>
        <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-8">

        <table class="table table-bordered table-responsive table-hover">    
            <form method="POST" action="insert.php">
            <?php        
                print $crud->formFields();
            ?>
            <input type="hidden" name="table" value="<?=$table?>">
            <tr><td></td><td><input class="btn btn-primary" name="send" type="submit" value="Inserir">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" type="button" onclick="location='index.php?table=<?=$table?>'" value=" Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
if(isset($_POST['send'])){

    if($crud->insert()){
        header('location: index.php?table=$crud->table');
    }else{
        echo 'Erro ao inserir o registro';
    }
}

require_once('./footer.php');
?>

