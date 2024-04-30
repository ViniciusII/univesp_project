<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
     
    $pdo->query("UPDATE tarefas set status = 'concluida' where id = '" . $id . "' ");
  

    echo "Excluído com Sucesso!!";
       
 ?>

       
 