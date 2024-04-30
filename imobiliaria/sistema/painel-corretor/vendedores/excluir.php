<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
     
    $pdo->query("DELETE from vendedores where id = '" . $id . "' ");
  

    echo "Excluído com Sucesso!!";
       
 ?>

       
 