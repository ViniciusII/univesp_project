<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];


	$res = $pdo->query("SELECT * FROM imoveis where id = '" . $id . "'  ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $tipo = $dados[0]['tipo'];
    
     //recuperar a quantidade de imoveis do tipo
    $res = $pdo->query("SELECT * FROM tipos where id = '" . $tipo . "'  ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $quantImoveis = $dados[0]['imoveis'];
    $totalImoveis = $quantImoveis - 1;

    $pdo->query("DELETE from imoveis where id = '" . $id . "' ");
    $pdo->query("UPDATE tipos SET imoveis = '" . $totalImoveis . "' WHERE id = '" . $tipo . "'");

    echo "Excluído com Sucesso!!";
       
 ?>

       
 