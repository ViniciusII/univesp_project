<?php 

include_once("../../conexao.php");

 
 $nome = $_POST['nome'];
 $cpf = $_POST['cpf'];
 $email = $_POST['email'];
 $senha = $_POST['senha'];
 $descricao = $_POST['descricao'];
 $twitter = $_POST['twitter'];
 $facebook = $_POST['facebook'];
 $telefone = $_POST['telefone'];
 $endereco = $_POST['endereco'];
            
 $id = $_POST['txtid'];
 $antigo = $_POST['antigo'];


 //SCRIPT PARA FOTO NO BANCO
$caminho = '../img/profiles/' .@$_FILES['imagem']['name'];
    if (@$_FILES['imagem']['name'] == ""){
      $imagem = "sem-foto.jpg";
    }else{
      $imagem = @$_FILES['imagem']['name']; 
    }
    
    $imagem_temp = @$_FILES['imagem']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);



//verificar se o campo é vazio
            if($nome == ""){
                echo "Preencha o Campo Nome!!";
                exit();
            }
            
            if($cpf == ""){
                echo "Preencha o Campo CPF!!";
                exit();
            }


            //verificar duplicaidade de dados
    if($cpf!=$antigo){
    $res = $pdo->query("SELECT * from usuarios where cpf = '$cpf'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
        echo 'CPF já Cadastrado';
        exit();
    }
    }


     if($imagem == "sem-foto.jpg"){
        $pdo->query("UPDATE usuarios SET nome = '" . $nome . "', cpf = '" . $cpf . "', email = '" . $email . "', senha = '" . $senha . "' WHERE id = '" . $id . "'");
        $pdo->query("UPDATE corretores SET nome = '" . $nome . "', cpf = '" . $cpf . "', telefone = '" . $telefone . "', email = '" . $email . "', endereco = '" . $endereco . "', descricao = '" . $descricao . "', twitter = '" . $twitter . "', facebook = '" . $facebook . "' WHERE cpf = '" . $antigo . "'");

       
               
       }else{
       $pdo->query("UPDATE usuarios SET nome = '" . $nome . "', cpf = '" . $cpf . "', email = '" . $email . "', senha = '" . $senha . "', foto = '" . $imagem . "' WHERE id = '" . $id . "'");

       $pdo->query("UPDATE corretores SET nome = '" . $nome . "', cpf = '" . $cpf . "', telefone = '" . $telefone . "', email = '" . $email . "', endereco = '" . $endereco . "', foto = '" . $imagem . "', descricao = '" . $descricao . "', twitter = '" . $twitter . "', facebook = '" . $facebook . "' WHERE cpf = '" . $antigo . "'");
                  
                }
                
            
            
  echo "Salvo com Sucesso!!";


 ?>


