<?php 
include_once("../../../conexao.php");
session_start();
$cpfUsuario = $_SESSION['cpf_usuario'];


$nomeVendedor = $_POST['nomeVendedor'];
    $vendedor = $_POST['doc'];
    $corretor = $cpfUsuario;
    $titulo = $_POST['titulo3'];
    $descricao = $_POST['descricao3'];
    $tipo = $_POST['tipo'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $valor = $_POST['valor3'];
    $valor = str_replace(',', '.', $valor);
    $ano = $_POST['ano'];
    $area = $_POST['area'];
    $quartos = $_POST['quartos'];
    $banheiros = $_POST['banheiros'];
    $suites = $_POST['suites'];
    $garagens = $_POST['garagens'];
    $piscinas = $_POST['piscinas'];
    $endereco = $_POST['endereco3'];
    $status = $_POST['status'];
    $condicao = $_POST['condicao'];
    $id = $_POST['txtid3'];

    
    //recuperar a quantidade de imoveis do tipo
    $res = $pdo->query("SELECT * FROM tipos where id = '" . $tipo . "'  ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $quantImoveis = $dados[0]['imoveis'];
    $totalImoveis = $quantImoveis + 1;

    //verificar se o campo é vazio
    if($id != ""){
        if($nomeVendedor == ""){
        echo "Selecione um Cliente Vendedor!!";
        exit();
        }
    }

    if($valor == ""){
        echo "Insira o Valor!!";
        exit();
        }


    if($ano == ""){
        echo "Insira o Ano!!";
        exit();
        }

     if($area == ""){
        echo "Insira a Área!!";
        exit();
        }


    if($quartos == ""){
        echo "Insira quartos!!";
        exit();
        }

    if($banheiros == ""){
        echo "Insira os Banheiros!!";
        exit();
        }

    if($suites == ""){
        echo "Insira as Suites!!";
        exit();
        }

     if($garagens == ""){
        echo "Insira as garagens!!";
        exit();
        }   
    
    if($piscinas == ""){
        echo "Insira as Piscinas!!";
        exit();
        }
    

    //INSERIR OS DADOS NO BANCO DE DADOS

        if ($id == "") {
                $pdo->query("INSERT into imoveis (vendedor, corretor, titulo, descricao, tipo, cidade, bairro, valor, ano, visitas, area, quartos, banheiros, suites, garagens, piscinas, img_principal, img_planta, img_banner, endereco, status, condicao) values ('" . $vendedor . "', '" . $corretor . "' , '" . $titulo . "' , '" . $descricao . "', '" . $tipo . "', '" . $cidade . "', '" . $bairro . "', '" . $valor . "', '" . $ano . "', '0', '" . $area . "', '" . $quartos . "', '" . $banheiros . "', '" . $suites . "', '" . $garagens . "', '" . $piscinas . "', 'sem-img.jpg', 'sem-img.jpg', 'sem-img.jpg', '" . $endereco . "', '" . $status . "', '" . $condicao . "')");

                $pdo->query("UPDATE tipos SET imoveis = '" . $totalImoveis . "' WHERE id = '" . $tipo . "'");
        } else {
            $pdo->query("UPDATE imoveis SET vendedor = '" . $vendedor . "', corretor = '" . $corretor . "', titulo = '" . $titulo . "', descricao = '" . $descricao . "', tipo = '" . $tipo . "', cidade = '" . $cidade . "', bairro = '" . $bairro . "', valor = '" . $valor . "', ano = '" . $ano . "',  area = '" . $area . "',  quartos = '" . $quartos . "',  banheiros = '" . $banheiros . "',  garagens = '" . $garagens . "',  suites = '" . $suites . "',  piscinas = '" . $piscinas . "',  endereco = '" . $endereco . "',  status = '" . $status . "',  condicao = '" . $condicao . "' WHERE id = '" . $id . "'");

            if ($status=="Vendido") {
                $res = $pdo->query("SELECT * FROM vendas where imovel = '" . $id . "' ");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                $linhas = count($dados);
                if($linhas == 0){
                    $pdo->query("INSERT into vendas (imovel, corretor, valor, pago, data) values ('" . $id . "', '" . $cpfUsuario . "' , '" . $valor . "' , 'Não', curDate())");
                }
            }
            
            
            if ($status=="Alugado") {
                $res = $pdo->query("SELECT * FROM alugueis where imovel = '" . $id . "'");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                $linhas = count($dados);
                if($linhas == 0){
                    $pdo->query("INSERT into alugueis (imovel, corretor, valor, ativo, data) values ('" . $id . "', '" . $cpfUsuario . "' , '" . $valor . "' , 'Não', curDate())");
                }
            }
        }


echo "Salvo com Sucesso!!";
        
?>
     



          