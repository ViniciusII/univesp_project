<?php 
include_once("../../../conexao.php");

$titulo = $_POST['titulo6'];
$descricao = $_POST['descricao6'];
$valor = $_POST['valor6'];
$valor = str_replace(',', '.', $valor);

@session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];

if($titulo == ""){
    echo "Preencha o Campo Titulo!!";
    exit();
}

if($valor == ""){
    echo "Preencha o Campo Valor!!";
    exit();
}

$pdo->query("INSERT into contas_pagar (valor, titulo, descricao, pago, tesoureiro, data) values ('" . $valor . "', '" . $titulo . "', '" . $descricao . "', 'Não', '" . $cpfUsuario . "', curDate())");


echo "Salvo com Sucesso!!";

?>

