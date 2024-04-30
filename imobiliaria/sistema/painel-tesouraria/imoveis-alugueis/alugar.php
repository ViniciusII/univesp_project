<?php 
include_once("../../../conexao.php");

$doc = trim(@$_POST['doc']);
$id = @$_POST['id'];
$datapgto = @$_POST['datapgto'];
$inicio = @$_POST['inicio'];
$fim = @$_POST['final'];


if($datapgto == ""){
    echo "Preencha as Datas!!";
    exit();
}

if($inicio == ""){
    echo "Preencha as Datas!!";
    exit();
}

if($fim == ""){
    echo "Preencha as Datas!!";
    exit();
}

 $pdo->query("UPDATE alugueis set ativo = 'Sim', data_pgto = '".$datapgto."', data_inicio = '".$inicio."', data_final = '".$fim."', inquilino = '".$doc."' where id = '" . $id . "'");

echo "Editado com Sucesso!!";

?>

