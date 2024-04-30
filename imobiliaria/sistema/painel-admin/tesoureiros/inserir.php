<?php 
include_once("../../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$id = $_POST['txtid'];
$antigo = $_POST['antigo'];


 //SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/profiles/' .@$_FILES['imagem']['name'];
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
  $imagem = @$_FILES['imagem']['name']; 
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
move_uploaded_file($imagem_temp, $caminho);


if($nome == ""){
    echo "Preencha o Campo Nome!!";
    exit();
}

if($cpf == ""){
    echo "Preencha o Campo CPF!!";
    exit();
}


             //verificar duplicidade de dados
if($cpf!=$antigo){
    $res = $pdo->query("SELECT * from tesoureiros where cpf = '$cpf'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'CPF já Cadastrado';
        exit();
    }
}


if($id == ""){
    $pdo->query("INSERT into tesoureiros (nome, cpf, telefone, email, endereco, foto) values ('" . $nome . "', '" . $cpf . "' , '" . $telefone . "' , '" . $email . "', '" . $endereco . "', '" . $imagem . "')");

    $pdo->query("INSERT into usuarios (nome, cpf, email, senha, nivel, foto) values ('" . $nome . "', '" . $cpf . "', '" . $email . "', '123', 'tesoureiro', '" . $imagem . "')");

}else{
    if($imagem == "sem-foto.jpg"){     
     $pdo->query("UPDATE tesoureiros SET nome = '" . $nome . "', cpf = '" . $cpf . "', telefone = '" . $telefone . "', email = '" . $email . "', endereco = '" . $endereco . "' WHERE id = '" . $id . "' ");   
     $pdo->query("UPDATE usuarios SET nome = '" . $nome . "', cpf = '" . $cpf . "', email = '" . $email . "' WHERE cpf = '" . $antigo . "' "); 
 }else{  
  $pdo->query("UPDATE tesoureiros SET nome = '" . $nome . "', cpf = '" . $cpf . "', telefone = '" . $telefone . "', email = '" . $email . "', endereco = '" . $endereco . "', foto = '" . $imagem . "' WHERE id = '" . $id . "' "); 
  $pdo->query("UPDATE usuarios SET nome = '" . $nome . "', cpf = '" . $cpf . "', email = '" . $email . "', foto = '" . $imagem . "' WHERE cpf = '" . $antigo . "' ");  

}

}

echo "Salvo com Sucesso!!";


?>

