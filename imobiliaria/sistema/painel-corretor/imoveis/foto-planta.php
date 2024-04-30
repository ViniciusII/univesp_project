<?php 
include_once("../../../conexao.php");

 $id = $_POST['id'];

//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/imoveis/' .@$_FILES['imgplanta']['name'];
    if (@$_FILES['imgplanta']['name'] == ""){
      $imagem = "sem-img.jpg";
    }else{
      $imagem = @$_FILES['imgplanta']['name']; 
    }
    
    $imagem_temp = @$_FILES['imgplanta']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);

    $pdo->query("UPDATE imoveis SET img_planta = '" . $imagem . "' WHERE id = '" . $id . "'");

    echo "Salvo com Sucesso!!";

 ?>