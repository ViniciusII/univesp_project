<?php 
include_once("../../../conexao.php");
session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao5'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$imovel = $_POST['imovel'];

$id = $_POST['txtid2'];
$antigo = $_POST['antigo1'];
$antigo2 = $_POST['antigo2'];


//verificar se o imovel existe
if($imovel != ""){
    
    $res = $pdo->query("SELECT * FROM imoveis where id = '" . $imovel . "' ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas == 0){
        echo 'Id do Imóvel não Cadastrado';
        exit();
    }else{
        $visitas = $dados[0]['visitas'];
        $visitas = $visitas + 1;
    }
}


if($titulo == ""){
    echo "Preencha o Campo Titulo!!";
    exit();
}



if($data == ""){
    echo "Preencha o Campo Data";
    exit();
}


if($hora == ""){
    echo "Preencha o Campo Hora";
    exit();
}



//verificar duplicidade de dados
if($hora!=$antigo || $data!=$antigo2){
    
    $res = $pdo->query("SELECT * FROM tarefas where data = '" . $data . "' and hora = '" . $hora . "' ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);
    if($linhas > 0){
          echo 'Horario Indisponível!';
        exit();
    }
}


if ($id == "") {
                $pdo->query("INSERT into tarefas (titulo, descricao, data, hora, id_imovel, corretor, status) values ('" . $titulo . "', '" . $descricao . "' , '" . $data . "' , '" . $hora . "', '" . $imovel . "', '" . $cpfUsuario . "', '')");

                if($imovel != ""){
                    $pdo->query("UPDATE imoveis SET visitas = '" . $visitas . "' WHERE id = '" . $imovel . "'");
                }
                

                               
            } else {
                $pdo->query("UPDATE tarefas SET titulo = '" . $titulo . "', descricao = '" . $descricao . "', data = '" . $data . "', hora = '" . $hora . "', id_imovel = '" . $imovel . "' WHERE id = '" . $id . "' ");
                              
            }


echo "Salvo com Sucesso!!";
        
?>
     

           
