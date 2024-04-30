<?php 
include_once("../../../conexao.php");
session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];

$nome = $_POST['nome2'];
$tipo = $_POST['tipo2'];
$cpf = $_POST['cpf2'];
$cnpj = $_POST['cnpj2'];
$telefone = $_POST['telefone2'];
$endereco = $_POST['endereco2'];

$id = $_POST['txtid2'];
$antigo = $_POST['antigo'];


if($nome == ""){
    echo "Preencha o Campo Nome!!";
    exit();
}

if($tipo=="Juridica"){
            $cpf = $cnpj;
            
        }

if($cpf == ""){
    echo "Preencha o Campo CPF/CNPJ!!";
    exit();
}


//verificar duplicidade de dados
if($cpf!=$antigo){
    
    $res = $pdo->query("SELECT * FROM vendedores where doc = '" . $cpf . "' and corretor = '" . $cpfUsuario . "' ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'Cliente já Cadastrado';
        exit();
    }
}


if ($id == "") {
                $pdo->query("INSERT into vendedores (nome, tipo_pessoa, doc, telefone, endereco, corretor) values ('" . $nome . "', '" . $tipo . "' , '" . $cpf . "' , '" . $telefone . "', '" . $endereco . "', '" . $cpfUsuario . "') ");

                               
            } else {
                $pdo->query("UPDATE vendedores SET nome = '" . $nome . "', tipo_pessoa = '" . $tipo . "', doc = '" . $cpf . "', telefone = '" . $telefone . "', endereco = '" . $endereco . "' WHERE id = '" . $id . "' ");
                              
            }

echo "Salvo com Sucesso!!";
        
?>
     

           
