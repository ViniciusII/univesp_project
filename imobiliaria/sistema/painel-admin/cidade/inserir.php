<?php 
include_once("../../../conexao.php");

$nome = $_POST['nomeCidade'];

$id = $_POST['txtid2'];
$antigo = $_POST['antigo'];


if($nome == ""){
    echo "Preencha o Campo Nome!!";
    exit();
}



             //verificar duplicidade de dados
if($nome!=$antigo){
    $res = $pdo->query("SELECT * FROM cidades where nome = '" . $nome . "'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'Cidade já Cadastrada';
        exit();
    }
}


if ($id == "") {
                $pdo->query("INSERT into cidades (nome) values ('" . $nome . "') ");

                               
            } else {
                $pdo->query("UPDATE cidades SET nome = '" . $nome . "' WHERE id = '" . $id . "' ");
                              
            }

echo "Salvo com Sucesso!!";

?>