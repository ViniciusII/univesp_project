<?php 
include_once("../../../conexao.php");

 $id = $_POST['id'];

//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/imoveis/' .@$_FILES['imgprincipal']['name'];
    if (@$_FILES['imgprincipal']['name'] == ""){
      $imagem = "sem-img.jpg";
    }else{
      $imagem = @$_FILES['imgprincipal']['name']; 
    }
    
    $imagem_temp = @$_FILES['imgprincipal']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);

    $pdo->query("UPDATE imoveis SET img_principal = '" . $imagem . "' WHERE id = '" . $id . "'");

    echo "Salvo com Sucesso!!";

 ?>