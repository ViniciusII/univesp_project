<?php 
include_once("../../../conexao.php");

 $id = $_POST['id'];

//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/imoveis/' .@$_FILES['imgimovel']['name'];
    if (@$_FILES['imgimovel']['name'] == ""){
      $imagem = "sem-img.jpg";
    }else{
      $imagem = @$_FILES['imgimovel']['name']; 
    }
    
    $imagem_temp = @$_FILES['imgimovel']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);

    $pdo->query("INSERT INTO imagens (id_imovel, imagem) values ('" . $id . "', '" . $imagem . "')");

    echo "Salvo com Sucesso!!";

 ?>