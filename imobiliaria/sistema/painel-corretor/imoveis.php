<?php 

include_once("../../conexao.php");
$pag = "imoveis";
$cpfUsuario = $_SESSION['cpf_usuario'];
$idImov = @$_GET['id'];
?>
   

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Imóvel</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>





<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Vendedor</th>
                        <th>Valor</th>

                        <th>Bairro</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php 

                    $query = $pdo->query("SELECT * FROM imoveis where corretor = '".$cpfUsuario."' order by id desc ");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }


                      $id = $res[$i]['id'];
                      $vendedor = $res[$i]['vendedor'];
                      $valor = $res[$i]['valor'];
                      $bairro = $res[$i]['bairro'];
                      $status = $res[$i]['status'];
                      $titulo = $res[$i]['titulo'];

                      $imagem = $res[$i]['img_principal'];

                       $res_2 = $pdo->query("SELECT * FROM bairros where id = '$bairro'");
                        $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
                        $nomeBairro = $dados_2[0]['nome'];


                        $res_2 = $pdo->query("SELECT * FROM vendedores where doc = '$vendedor'");
                        $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
                        $nomeVendedor = $dados_2[0]['nome'];

                        $valor = number_format($valor, 2, ',', '.');

                      ?>

                   
                    <tr>
                        <td><?php echo $titulo ?></td>
                        <td><?php echo $nomeVendedor ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $nomeBairro ?></td>
                        <td><?php echo $status ?></td>

                        <td><img src="../img/imoveis/<?php echo $imagem ?>" width="50px"></td>
                        <td>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=imagens&id=<?php echo $id ?>" class='text-info mr-1' title='Inserir Imagens'><i class='far fa-file-image'></i></a>
                        </td>
                    </tr>

                    <?php } ?>




                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['id'] > 0) {
                    $titulo2 = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM imoveis where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    
                                $vendedorV = $res[0]['vendedor'];
                                $corretor = $res[0]['corretor'];
                                $titulo3 = $res[0]['titulo'];
                                $descricao3 = $res[0]['descricao'];
                                $tipo = $res[0]['tipo'];
                                $cidade = $res[0]['cidade'];
                                $bairro = $res[0]['bairro'];
                                $valor3 = $res[0]['valor'];
                                $ano = $res[0]['ano'];
                                $visitas = $res[0]['visitas'];
                                $area = $res[0]['area'];
                                $quartos = $res[0]['quartos'];
                                $banheiros = $res[0]['banheiros'];
                                $suites = $res[0]['suites'];
                                $garagens = $res[0]['garagens'];
                                $piscinas = $res[0]['piscinas'];
                                $imgPrincipal = $res[0]['img_principal'];
                                $imgPlanta = $res[0]['img_planta'];
                                $imgBanner = $res[0]['img_banner'];
                                $endereco3 = $res[0]['endereco'];
                                $status = $res[0]['status'];
                                $condicao = $res[0]['condicao'];

                                $valor3 = number_format($valor3, 2, ',', '.');

                } else {
                    $titulo2 = "Inserir Registro";

                }


                ?>
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo2 ?></h5>
                
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" enctype="multipart/form-data" >
                <div class="modal-body">


                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Vendedor</label>
                                <select class="form-control" name="vendedor" id="vendedor">

                               <?php 
                            if ($id2 != "") {
                                $query = $pdo->query("SELECT * FROM vendedores where doc = '" . $vendedor . "' ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                
                                $nomeV = $res[0]['nome'];

                                echo "<option value='" . $vendedor . "'>" . $nomeV . "</option>";
                             } else {
                                          echo "<option value='0'>Seleciconar Vendedor</option>";
                                        }

                            $query2 = $pdo->query("SELECT * FROM vendedores where corretor = '".$cpfUsuario."' order by id desc limit 30");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < count($res2); $i++) { 
                              foreach ($res2[$i] as $key => $value) {
                              }
                              if(@$nomeV != $res2[$i]['nome']){
                                echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['nome'] . "</option>";
                            }
                        }


                        ?>
                                    

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >CPF/CNPJ Vendedor</label>
                                <div class="input-group">
                                    <input value="<?php echo @$vendedorV ?>" type="text" class="form-control small" placeholder="CPF/CNPJ" name="doc" id="doc" aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button id="btn-buscar" name="btn-buscar" class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Nome Vendedor</label>
                                <input value="<?php echo @$nomeV ?>" readonly type="text" name="nomeVendedor" id="nomeVendedor" class="form-control" placeholder="Nome Vendedor">
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Tipo</label>
                                <select class="form-control" name="tipo" id="tipo">

                                    <?php 
                            if ($id2 != "") {
                                $query = $pdo->query("SELECT * FROM tipos where id = '" . $tipo . "'  ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                
                                $nome2 = $res[0]['nome'];

                                echo "<option value='" . $tipo . "'>" . $nome2 . "</option>";
                            }

                            $query2 = $pdo->query("SELECT * FROM tipos order by nome asc");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < count($res2); $i++) { 
                              foreach ($res2[$i] as $key => $value) {
                              }
                              if(@$nome2 != $res2[$i]['nome']){
                                echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['nome'] . "</option>";
                            }
                        }


                        ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Cidade</label>
                                <select class="form-control" name="cidade" id="cidade">

                                    <?php 
                            if ($id2 != "") {
                                $query = $pdo->query("SELECT * FROM cidades where id = '" . $cidade . "' ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                
                                $nome3 = $res[0]['nome'];

                                echo "<option value='" . $cidade . "'>" . $nome3 . "</option>";
                            }

                            $query2 = $pdo->query("SELECT * FROM cidades order by nome asc");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < count($res2); $i++) { 
                              foreach ($res2[$i] as $key => $value) {
                              }
                              if(@$nome3 != $res2[$i]['nome']){
                                echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['nome'] . "</option>";
                            }
                        }


                        ?>

                                  

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4" id="listar-bairros">

                        </div>
                        <input value="<?php echo $bairro ?>" type="hidden" name="txtbairro" id="txtbairro">
                        <input value="teste" type="hidden" name="txtcidade" id="txtcidade">
                        <button id="btn-buscar-bairro" name="btn-buscar-bairro" class="border-0" type="hidden"></button> 

                    </div>   


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Titulo</label>
                                <input value="<?php echo @$titulo3 ?>" type="text" name="titulo3" id="titulo" class="form-control" placeholder="Título">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Valor</label>
                                <input value="<?php echo @$valor3 ?>" type="text" name="valor3" id="valor" class="form-control" placeholder="Valor">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Ano</label>
                                <input value="<?php echo $ano ?>" type="number" name="ano" id="ano" class="form-control" placeholder="Ano">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Área</label>
                                <input value="<?php echo $area ?>" type="number" name="area" id="area" class="form-control" placeholder="Área">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Quartos</label>
                                <input value="<?php echo $quartos ?>" type="number" name="quartos" id="quartos" class="form-control" placeholder="Quartos">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Banheiros</label>
                                <input value="<?php echo $banheiros ?>" type="number" name="banheiros" id="banheiros" class="form-control" placeholder="Banheiros">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Suítes</label>
                                <input value="<?php echo $suites ?>" type="number" name="suites" id="suites" class="form-control" placeholder="Suítes">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Garagens</label>
                                <input value="<?php echo $garagens ?>" type="number" name="garagens" id="garagens" class="form-control" placeholder="Garagens">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Piscinas</label>
                                <input value="<?php echo $piscinas ?>" type="number" name="piscinas" id="piscinas" class="form-control" placeholder="Piscinas">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descrição</label>
                        <textarea maxlength="1000" type="text" name="descricao3" id="descricao" class="form-control"><?php echo @$descricao3 ?></textarea>
                    </div>  

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Endereço</label>
                                <input value="<?php echo @$endereco3 ?>" type="text" name="endereco3" id="endereco" class="form-control" placeholder="Endereço">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Status</label>
                                <select class="form-control" id="status" name="status">

                                    <?php
                                        if ($_GET['id'] != null) {?>

                                    <option value="<?php echo $status ?>"><?php echo $status ?></option>

                                    <?php } ?>

                                    <?php if ($status!="Para Venda") { ?>
                                    <option value="Para Venda">Para Venda</option>
                                    <?php } ?>

                                    <?php if ($status!="Para Aluguel") { ?>
                                    <option value="Para Aluguel">Para Aluguel</option>
                                    <?php } ?>

                                    <?php
                                        if ($_GET['id'] != null) { ?>

                                    <?php if ($status!="Vendido") { ?>
                                    <option value="Vendido">Vendido</option>
                                    <?php } ?>

                                     <?php if ($status!="Alugado") { ?>
                                    <option value="Alugado">Alugado</option>
                                    <?php } ?>

                                    <?php } ?>

                                    <?php if ($status!="Inativo") { ?>
                                    <option value="Inativo">Inativo</option>
                                    <?php } ?>



                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Condição</label>
                                <select class="form-control" id="condicao" name="condicao">

                                     <?php
                                        if (@$_GET['id'] != null) { ?>

                                    <option value="<?php echo $condicao ?>"><?php echo $condicao ?></option>

                                     <?php } ?>

                                     <?php if ($condicao!="Usado") { ?>
                                    <option value="Usado">Usado</option>
                                     <?php } ?>

                                     <?php if ($condicao!="Novo") { ?>
                                    <option value="Novo">Novo</option>
                                    <?php } ?>

                                     <?php if ($condicao!="Planta") { ?>
                                    <option value="Planta">Planta</option>
                                     <?php } ?>




                                </select>
                            </div>
                        </div>


                    </div>



                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 


                </div>
                <div class="modal-footer">



                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid3" id="txtid">


                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal" id="modal-imagens" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir Imagens</h5>
                <button id="btn-fechar-imagens" type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <a title="Inserir Foto Principal " href="" data-target="#modalPrincipal" data-toggle="modal" class="text-info mr-2"><i class="fas fa-image mr-1"></i>Principal</a>
                <a title="Inserir Foto Banner " href="" data-target="#modalBanner" data-toggle="modal" class="text-success mr-2"><i class="fas fa-image mr-1"></i>Banner</a>
                <a title="Inserir Foto Planta " href="" data-target="#modalPlanta" data-toggle="modal" class="text-primary mr-2"><i class="fas fa-image mr-1"></i>Planta</a>
                <a title="Inserir Fotos " href="" data-target="#modalFotos" data-toggle="modal" class="text-secondary mr-2"><i class="fas fa-image mr-1"></i>Demais Fotos</a>


            </div>

        </div>
    </div>
</div>                    


<div class="modal" id="modalPrincipal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Principal</h5>
                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-principal" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group">
                                <label>Foto Principal</label>
                                <input value="<?php echo $imgPrincipal ?>" type="file" class="form-control-file" id="imgprincipal" name="imgprincipal" onchange="carregarImgPrincipal();">

                            </div>

                        </div>

                        <div class="col-md-6" align="right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar">Cancelar</button>
                            
                            <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                            <button type="submit" id="btn-principal" name="btn-principal" class="btn btn-info">Salvar</button>

                        </div>

                    </div>

                    <div class="col-md-12 mb-2">
                        <img src="../img/imoveis/<?php echo $imgPrincipal ?>" alt="Carregue sua Imagem" id="targetPrincipal" width="100%">
                    </div>


                    <div align="center" id="mensagem_img" class="">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>         




<div class="modal" id="modalPlanta" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Planta</h5>
                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-planta" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group">
                                <label>Foto Planta</label>
                                <input value="<?php echo $imgPlanta ?>" type="file" class="form-control-file" id="imgplanta" name="imgplanta" onchange="carregarImgPlanta();">

                            </div>

                        </div>

                        <div class="col-md-6" align="right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-planta">Cancelar</button>
                            
                            <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                            <button type="submit" id="btn-planta" name="btn-planta" class="btn btn-info">Salvar</button>

                        </div>

                    </div>

                    <div class="col-md-12 mb-2">
                        <img src="../img/imoveis/<?php echo $imgPlanta ?>" alt="Carregue sua Imagem" id="targetPlanta" width="100%">
                    </div>


                    <div align="center" id="mensagem_img" class="">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>                    





<div class="modal" id="modalBanner" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Banner</h5>
                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-banner" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group">
                                <label>Foto Banner (1280x720)</label>
                                <input value="<?php echo $imgBanner ?>" type="file" class="form-control-file" id="imgbanner" name="imgbanner" onchange="carregarImgBanner();">

                            </div>

                        </div>

                        <div class="col-md-6" align="right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-banner">Cancelar</button>
                            
                            <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                            <button type="submit" id="btn-banner" name="btn-banner" class="btn btn-info">Salvar</button>

                        </div>

                    </div>

                    <div class="col-md-12 mb-2">
                        <img src="../img/imoveis/<?php echo $imgBanner ?>" alt="Carregue sua Imagem" id="targetBanner" width="100%">
                    </div>


                    <div align="center" id="mensagem_img" class="">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>           





<div class="modal" id="modalFotos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imagens do Imóvel</h5>
                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-fotos" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-5">
                            <div class="col-md-12 form-group">
                                <label>Imagens do Imóvel</label>
                                <input type="file" class="form-control-file" id="imgimovel" name="imgimovel" onchange="carregarImgImovel();">

                            </div>

                            <div class="col-md-12 mb-2">
                                <img src="../img/imoveis/sem-img.jpg" alt="Carregue sua Imagem" id="targetImovel" width="100%">
                            </div>

                        </div>

                        <div class="col-md-7" id="listar-img">

                        </div>




                    </div>

                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-fotos">Cancelar</button>
                        
                        <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                        <button type="submit" id="btn-fotos" name="btn-fotos" class="btn btn-info">Salvar</button>

                    </div>


                    <small>     
                        <div align="center" id="mensagem_fotos" class="">

                        </div>
                    </small>   
                </form>
            </div>

        </div>
    </div>
</div>   






<div class="modal" id="modalDeletarImg" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir esta Imagem?</p>

                <div align="center" id="mensagem_excluir_img" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-img">Cancelar</button>
                <form method="post">
                    <input type="hidden" name="id_foto" id="id_foto">                  
                    <button type="button" id="btn-deletar-img" name="btn-deletar-img" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

?>

<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

?>


<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}

?>        


 <?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "imagens") {
    echo "<script>$('#modal-imagens').modal('show');</script>";
}

?>                 




<!--SCRIPT PARA EXECUTAR ALGUMAS TAREFAS AO INICIAR -->
<script type="text/javascript">
    $(document).ready(function () {
        listarImagens();

    });
</script>

<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";

        $('#btn-salvar').click(function (event) {
            event.preventDefault();
            console.log(pag);
            $.ajax({
                url: pag + "/inserir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    $('#mensagem').removeClass()

                    if (mensagem.trim() == "Salvo com Sucesso!!") {
                        $('#mensagem').addClass('text-success')
                        $('#nome').val('')
                        //$('#btn-buscar').click();
                        $('#btn-fechar').click();
                        window.location = "index.php?pag=" + pag;
                    } else {

                        $('#mensagem').addClass('text-danger')
                    }

                    $('#mensagem').text(mensagem)

                },

            })
        })
    })
</script>





<!--EXECUÇÃO DO SUBMIT DO FORM -->
<script type="text/javascript">

    $("#form").submit(function () {

        event.preventDefault();

        //var formData = new FormData(this);


    });
</script>




<!--AJAX PARA EXECUTAR A EDIÇÃO DA IMAGEM FOTO PRINCIPAL -->
<script type="text/javascript">


    $("#form-principal").submit(function () {

        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/foto-principal.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_img').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem_img').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-cancelar').click();
                    //window.location = "index.php?pag=" + pag;

                } else {

                    $('#mensagem_img').addClass('text-danger')

                }

                $('#mensagem_img').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });



</script>





<!--AJAX PARA EXECUTAR A EDIÇÃO DA IMAGEM FOTO PLANTA -->
<script type="text/javascript">


    $("#form-planta").submit(function () {

        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/foto-planta.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_img').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem_img').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-cancelar-planta').click();
                    //window.location = "index.php?pag=" + pag;

                } else {

                    $('#mensagem_img').addClass('text-danger')

                }

                $('#mensagem_img').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });



</script>





<!--AJAX PARA EXECUTAR A EDIÇÃO DA IMAGEM FOTO BANNER -->
<script type="text/javascript">


    $("#form-banner").submit(function () {

        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/foto-banner.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_img').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem_img').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-cancelar-banner').click();
                    //window.location = "index.php?pag=" + pag;

                } else {

                    $('#mensagem_img').addClass('text-danger')

                }

                $('#mensagem_img').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });



</script>





<!--AJAX PARA EXECUTAR A INSERÇÃO DAS DEMAIS FOTOS DO IMÓVEL -->
<script type="text/javascript">


    $("#form-fotos").submit(function () {

        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/fotos-imovel.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_fotos').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem_fotos').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    //$('#btn-cancelar-fotos').click();
                    listarImagens();

                } else {

                    $('#mensagem_fotos').addClass('text-danger')

                }

                $('#mensagem_fotos').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });



</script>



<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!!') {


                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem)



                },

            })
        })
    })
</script>




<!--AJAX PARA EXCLUSÃO DAS FOTOS DOS IMOVEIS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar-img').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir-foto.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!!') {


                        $('#btn-cancelar-img').click();
                        listarImagens();
                    }

                    $('#mensagem_excluir_img').text(mensagem)



                },

            })
        })
    })
</script>



<!--AJAX PARA LISTAR OS DADOS DO VENDEDOR -->
<script type="text/javascript">
    $(document).ready(function () {
        var idImov = "<?=$idImov?>";
        if (idImov == null) {
            //$('#btn-buscar').click();
            var pag = "<?=$pag?>";
            $.ajax({
                url: pag + "/buscar-vendedor.php",
                method: "post",
                data: $('#frm').serialize(),
                dataType: "html",
                success: function (result) {
                    console.log(result);
                    document.getElementById('nomeVendedor').value = result;
                }
            })
        }

    })
</script>



<!--AJAX PARA BUSCAR DADOS PELO BOTÃO -->
<script type="text/javascript">

    $('#btn-buscar').click(function (event) {
        var pag = "<?=$pag?>";

        event.preventDefault();
        $.ajax({
            url: pag + "/buscar-vendedor.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {
                console.log(result);
                var resultado = result.split(",");

                if (result == 0) {
                    document.getElementById('nomeVendedor').value = "";
                    document.getElementById('doc').value = "";
                    document.getElementById('btn-salvar').disabled = true;
                } else {
                    document.getElementById('nomeVendedor').value = resultado[0];
                    document.getElementById('doc').value = resultado[1];
                    document.getElementById('btn-salvar').disabled = false;
                }

            }
        })
    })


</script>




<!-- Script para buscar pelo select -->
<script type="text/javascript">
    $(document).ready(function () {
        var idImov = "<?=$idImov?>";
        console.log(idImov)
        if (idImov === "null") {
            document.getElementById('doc').value = "";
            document.getElementById('btn-salvar').disabled = true;

            document.getElementById('valor').value = "0";
            document.getElementById('ano').value = "0";
            document.getElementById('area').value = "0";
            document.getElementById('quartos').value = "0";
            document.getElementById('banheiros').value = "0";
            document.getElementById('suites').value = "0";
            document.getElementById('garagens').value = "0";
            document.getElementById('piscinas').value = "0";
        }


        $('#vendedor').change(function () {

            if (idImov == null) {
                if ($(this).val() === '0') {
                    document.getElementById('doc').value = "";
                    document.getElementById('nomeVendedor').value = "";
                    document.getElementById('btn-salvar').disabled = true;
                } else {
                    document.getElementById('btn-salvar').disabled = false;
                }
            }

            $('#btn-buscar').click();


        });

    })
</script>



<!--AJAX PARA LISTAR OS DADOS DO BAIRRO NO SELECT -->
<script type="text/javascript">
    $(document).ready(function () {

        document.getElementById('txtcidade').value = document.getElementById('cidade').value;

        $('#btn-buscar-bairro').click();

        var pag = "<?=$pag?>";
        $.ajax({
            url: pag + "/listar-bairros.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {

                $('#listar-bairros').html(result);
            }
        })

    })
</script>


<!-- Script para buscar pelo select -->
<script type="text/javascript">

    $('#cidade').change(function () {

        document.getElementById('txtcidade').value = $(this).val();
        document.getElementById('txtbairro').value = $(this).val();
        $('#btn-buscar-bairro').click();
    })

</script>




<!--AJAX PARA BUSCAR DADOS PELO BOTÃO BAIRROS -->
<script type="text/javascript">

    $('#btn-buscar-bairro').click(function (event) {
        var pag = "<?=$pag?>";

        $.ajax({
            url: pag + "/listar-bairros.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {

                $('#listar-bairros').html(result);
            }
        })
    })


</script>



<!--FUNCAO PARA CHAMAR MODAL DE DELETAR IMAGEM DAS FOTOS -->
<script type="text/javascript">
    function deletarImg(img) {
        document.getElementById('id_foto').value = img;
        $('#modalDeletarImg').modal('show');
    }
</script>

<!--AJAX PARA LISTAR OS DADOS DAS IMAGENS DOS IMÓVEIS NA MODAL -->
<script type="text/javascript">

    function listarImagens() {
        var pag = "<?=$pag?>";
        $.ajax({
            url: pag + "/listar-imagens.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {

                $('#listar-img').html(result);
            }
        })
    }



</script>




<!--SCRIPT PARA TROCAR As IMAGEns  -->
<script type="text/javascript">

    function carregarImgPrincipal() {

        var target = document.getElementById('targetPrincipal');
        var file = document.querySelector("input[id=imgprincipal]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }


    function carregarImgPlanta() {

        var target = document.getElementById('targetPlanta');
        var file = document.querySelector("input[id=imgplanta]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

    function carregarImgBanner() {

        var target = document.getElementById('targetBanner');
        var file = document.querySelector("input[id=imgbanner]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }



    function carregarImgImovel() {

        var target = document.getElementById('targetImovel');
        var file = document.querySelector("input[id=imgimovel]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
            
        };

        if (file) {
            reader.readAsDataURL(file);
            

        } else {
            target.src = "";
        }
        
         
    }

</script>


<!--ATUALIZAR PÁGINA APÓS FECHAR MODAL DAS IMAGENS -->
<script type="text/javascript">
    var pag = "<?=$pag?>";
    $('#btn-fechar-imagens').click(function (event) {

        window.location = "index.php?pag=" + pag;

    })
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>