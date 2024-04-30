<?php 
include_once("../../../conexao.php");

$id = $_POST['id'];

@session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];

$query = $pdo->query("SELECT * FROM contas_receber where id = '" . $id . "' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$tipo = $res[0]['tipo'];
$valor = $res[0]['valor'];
$corretor = $res[0]['corretor'];

$valorCorretor = $valor * $comissaoCorretores;
$valorCaixa = $valor * $comissaoImobiliaria;

$pdo->query("UPDATE contas_receber set pago = 'Sim' where id = '" . $id . "' ");
$pdo->query("INSERT INTO entradas (valor, tesoureiro, corretor, valor_corretor, valor_caixa, data, tipo) values ('" . $valor . "', '" . $cpfUsuario . "', '" . $corretor . "', '" . $valorCorretor . "', '" . $valorCaixa . "', curDate(), '".$tipo."' ) ");
$pdo->query("INSERT INTO movimentacoes (tipo, movimento, valor, tesoureiro, data) values ('Entrada', '".$tipo."', '" . $valorCaixa . "', '" . $cpfUsuario . "', curDate()) ");

echo "Editado com Sucesso!!";

?>