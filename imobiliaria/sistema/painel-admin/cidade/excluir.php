<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
     
    $pdo->query("DELETE from cidades where id = '" . $id . "' ");
  

    echo "Excluído com Sucesso!!";
       
 ?>

       
 