<?php 
include_once("../../../conexao.php");

$doc = trim(@$_POST['doc']);
$id = @$_POST['id'];
$datapgto = @$_POST['datapgto'];

if($datapgto == ""){
    echo "Escolha um Data para Pagamento";
    exit();
}


$res_2 = $pdo->query("SELECT * FROM vendas where id = '" . $id . "' ");
$dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
$valor = $dados_2[0]['valor'];
$corretor = $dados_2[0]['corretor'];

$res_2 = $pdo->query("SELECT * FROM compradores where doc = '" . $doc . "' ");
$dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
$nomeInquilino = $dados_2[0]['nome'];

$pdo->query("UPDATE vendas set pago = 'Sim', data_pgto = '" . $datapgto . "', comprador = '" . $doc . "' where id = '" . $id . "'");  

$pdo->query("INSERT into contas_receber (valor, titulo, descricao, tipo, corretor, data, pago, cliente) values ('" . $valor . "', 'Pagamento Venda', '" . $nomeInquilino . "', 'Venda', '" . $corretor . "', curDate(), 'Não', '" . $doc . "'  )"); 


echo "Editado com Sucesso!!";

?>