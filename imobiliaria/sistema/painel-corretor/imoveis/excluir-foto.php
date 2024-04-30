<?php 
include_once("../../../conexao.php");
$id = $_POST['id_foto'];
    
     
    $pdo->query("DELETE from imagens where id = '" . $id . "' ");
  

    echo "Excluído com Sucesso!!";
       
 ?>

       
 