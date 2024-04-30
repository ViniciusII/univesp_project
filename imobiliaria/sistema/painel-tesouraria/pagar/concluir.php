<?php 
include_once("../../../conexao.php");

$id = $_POST['id'];

@session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];

$query = $pdo->query("SELECT * FROM contas_pagar where id = '" . $id . "' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$tipo = $res[0]['pago'];
$valor = $res[0]['valor'];
$corretor = $res[0]['tesoureiro'];
$titulo = $res[0]['titulo'];

if ($titulo=="Aluguel") {
                $valorTotal = $comissaoCorretores + $comissaoImobiliaria;
                $valorTotal = $valor - $valor * $valorTotal;

}else{
                $valorTotal = $valor;
}


$pdo->query("UPDATE contas_pagar set pago = 'Sim' where id = '" . $id . "'");
$pdo->query("INSERT INTO saidas (valor, tesoureiro, descricao, data) values ('" . $valorTotal . "', '" . $cpfUsuario . "', '" . $titulo . "', curDate())");
$pdo->query("INSERT INTO movimentacoes (tipo, movimento, valor, tesoureiro, data) values ('Saída', '" . $titulo . "', '" . $valorTotal . "', '" . $cpfUsuario . "', curDate())");

echo "Editado com Sucesso!!";

?>