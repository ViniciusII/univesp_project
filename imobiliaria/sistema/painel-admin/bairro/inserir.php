<?php 
include_once("../../../conexao.php");

$nome = $_POST['nomeBairro'];
$cidade = $_POST['cidade'];
$id = $_POST['txtid2'];
$antigo = $_POST['antigo'];


if($nome == ""){
    echo "Preencha o Campo Nome!!";
    exit();
}

if($cidade == ""){
    echo "Preencha o Campo Cidade!!";
    exit();
}


             //verificar duplicidade de dados
if($nome!=$antigo){
    $res = $pdo->query("SELECT * FROM bairros where nome = '" . $nome . "'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'Bairro já Cadastrado';
        exit();
    }
}


if ($id == "") {
                $pdo->query("INSERT into bairros (nome, cidade) values ('" . $nome . "', '" . $cidade . "') ");

                               
            } else {
                $pdo->query("UPDATE bairros SET nome = '" . $nome . "', cidade = '" . $cidade . "' WHERE id = '" . $id . "' ");
                              
            }

echo "Salvo com Sucesso!!";

?>