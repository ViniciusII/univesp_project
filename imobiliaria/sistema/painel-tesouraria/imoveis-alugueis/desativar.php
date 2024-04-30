<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
    

    $pdo->query("UPDATE alugueis set ativo = 'Não', data = curDate(), data_pgto = null, data_inicio = null, data_final = null, inquilino = '' where id = '" . $id . "' ");
   

    echo "Desativado com Sucesso!!";
       
 ?>

       
 