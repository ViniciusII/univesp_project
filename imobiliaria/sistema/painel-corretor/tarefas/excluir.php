<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
     
    $pdo->query("DELETE from tarefas where id = '" . $id . "' ");
  

    echo "Excluído com Sucesso!!";
       
 ?>

       
 