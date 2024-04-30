<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
    

    $pdo->query("DELETE from tipos where id = '" . $id . "' ");
    

    echo "Excluído com Sucesso!!";
       
 ?>

       
 