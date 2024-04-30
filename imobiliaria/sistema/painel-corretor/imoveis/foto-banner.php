<?php 
include_once("../../../conexao.php");

 $id = $_POST['id'];

//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/imoveis/' .@$_FILES['imgbanner']['name'];
    if (@$_FILES['imgbanner']['name'] == ""){
      $imagem = "sem-img.jpg";
    }else{
      $imagem = @$_FILES['imgbanner']['name']; 
    }
    
    $imagem_temp = @$_FILES['imgbanner']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);

    $pdo->query("UPDATE imoveis SET img_banner = '" . $imagem . "' WHERE id = '" . $id . "'");

    echo "Salvo com Sucesso!!";

 ?>