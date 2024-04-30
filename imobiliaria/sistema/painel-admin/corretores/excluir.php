<?php 
include_once("../../../conexao.php");
$id = $_POST['id'];
    
     //recuperar o cpf do usuario para exclusão
        $res = $pdo->query("SELECT * FROM corretores where id = '" . $id . "' ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $cpf = $dados[0]['cpf'];

    $pdo->query("DELETE from corretores where id = '" . $id . "' ");
    $pdo->query("DELETE from usuarios where cpf = '" . $cpf . "' ");

    echo "Excluído com Sucesso!!";
       
 ?>

       
 