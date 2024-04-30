<?php 
include_once("../../../conexao.php");

 $id = $_POST['id'];

//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/contas/' .@$_FILES['imagem']['name'];
    if (@$_FILES['imagem']['name'] == ""){
      $imagem = "sem-foto.jpg";
    }else{
      $imagem = @$_FILES['imagem']['name']; 
    }
    
    $imagem_temp = @$_FILES['imagem']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);

    $pdo->query("UPDATE contas_pagar SET foto = '" . $imagem . "' WHERE id = '" . $id . "'");

    echo "Salvo com Sucesso!!";

 ?>