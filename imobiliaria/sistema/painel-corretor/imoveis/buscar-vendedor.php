<?php 
include_once("../../../conexao.php");


$doc = trim(@$_POST['doc']); 
$idVendedor = @$_POST['vendedor']; 

if ($idVendedor != null && $idVendedor!="0") {

    $res = $pdo->query("SELECT * FROM vendedores where id = '" . $idVendedor . "' ");
       
} else {
             $res = $pdo->query("SELECT * FROM vendedores where doc = '" . $doc . "' order by id desc ");
        }

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
 $linhas = count($dados);
    if($linhas > 0){
echo $dados[0]['nome'];
echo ",";
echo $dados[0]['doc'];
$val = "1";  
}

if(@$val==""){
            echo "0";
        }


        
?>
