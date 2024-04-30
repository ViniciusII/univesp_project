<?php 
include_once("../../../conexao.php");

$nome = $_POST['nome'];

$id = $_POST['txtid'];
$antigo = $_POST['antigo'];


 //SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/imoveis/' .@$_FILES['imagem']['name'];
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-img.jpg";
}else{
  $imagem = @$_FILES['imagem']['name']; 
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
move_uploaded_file($imagem_temp, $caminho);


if($nome == ""){
    echo "Preencha o Campo Nome!!";
    exit();
}



             //verificar duplicidade de dados
if($nome!=$antigo){
    $res = $pdo->query("SELECT * from tipos where nome = '$nome'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'Tipo já Cadastrado';
        exit();
    }
}


if($id == ""){
    $pdo->query("INSERT into tipos (nome, imagem, imoveis) values ('" . $nome . "', '" . $imagem . "' , '0' )");

    
}else{
    if($imagem == "sem-foto.jpg"){     
     $pdo->query("UPDATE tipos SET nome = '" . $nome . "' WHERE id = '" . $id . "' ");   
    
 }else{  
  $pdo->query("UPDATE tipos SET nome = '" . $nome . "', imagem = '" . $imagem . "' WHERE id = '" . $id . "' "); 
  

}

}

echo "Salvo com Sucesso!!";


?>

