<jsp:include page="cabecalho.jsp" /> 

<?php 

include_once("conexao.php");
include_once("cabecalho.php");

$id = $_GET['id'];

 ?>

  <?php 
          $res = $pdo->query("SELECT * FROM imoveis where id = '" . $id . "' ");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            $id = $dados[$i]['id']; 
            $status = $dados[$i]['status']; 
                        $imagem = $dados[$i]['img_principal']; 
                        $valor = $dados[$i]['valor']; 
                        $titulo = $dados[$i]['titulo']; 
                        $bairro = $dados[$i]['bairro']; 
                        $area = $dados[$i]['area']; 
                        $quartos = $dados[$i]['quartos']; 
                        $banheiros = $dados[$i]['banheiros']; 
                        $garagens = $dados[$i]['garagens']; 
                        $corretor = $dados[$i]['corretor'];

                         $status = $dados[$i]['status'];
            
           $imagemPlanta = $dados[$i]['img_planta'];
            
            $tipo = $dados[$i]['tipo'];
            $descricao = $dados[$i]['descricao'];
            $suites = $dados[$i]['suites'];
            $piscinas = $dados[$i]['piscinas'];
            $ano = $dados[$i]['ano'];
            $condicao = $dados[$i]['condicao'];


                         $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '$corretor'");
            $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
            $nomeCorretor = $dados_2[0]['nome'];
                            $telefoneCorretor = $dados_2[0]['telefone'];
                            $imgCorretor = $dados_2[0]['foto'];
                            $emailCorretor = $dados_2[0]['email'];


            $res_2 = $pdo->query("SELECT * FROM bairros where id = '$bairro'");
            $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
            $nomeBairro = $dados_2[0]['nome'];


            $res_3 = $pdo->query("SELECT * FROM tipos where id = '$tipo'");
            $dados_3 = $res_3->fetchAll(PDO::FETCH_ASSOC);            
            $nomeTipo = $dados_3[0]['nome'];

             if ($status == "Para Venda") {
                            $classe = "c-red";
                        } else {
                            $classe = "";
              }

            ?>



<!-- Property Details Section Begin -->
<section class="property-details-section">

    <div class="fp-slider owl-carousel mb-4">

        <?php 

 $res = $pdo->query("SELECT * FROM imagens where id_imovel = '$id' ");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

            $img_imovel = $dados[$i]['imagem']; 
            
         ?>

       

        <!-- Inicio do Carrousel -->
        <div class="fp-item set-bg" data-setbg="sistema/img/imoveis/<?php echo $img_imovel ?>"></div>

        <!-- Final do Carrousel -->

        <?php }
        ?>


    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="pd-text">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pd-title">

                                <div class="label <?php echo $classe ?>"><?php echo $status ?></div>
                                <div class="pt-price"><?php echo $valor ?>
                                    <?php if ($status == "Para Aluguel") {
                                            echo"<span>/mes</span>";
                                        } ?>

                                </div>
                                <h3><?php echo $titulo ?></h3>
                                <p><span class="icon_pin_alt"></span> <?php echo $nomeBairro ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                    <div class="pd-board">
                        <div class="tab-board">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Detalhes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Descrição</a>
                                </li>

                            </ul><!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="tab-details">
                                        <ul class="left-table">
                                            <li>
                                                <span class="type-name">Tipo Imóvel</span>
                                                <span class="type-value"><?php echo $nomeTipo ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Código Imóvel</span>
                                                <span class="type-value"><?php echo $id ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Valor</span>
                                                <span class="type-value">R$ <?php echo number_format($valor, 2, ',', '.'); ?>

                                                    <?php if ($status=="Para Aluguel") {
                                                            echo "<span>/mes</span>";
                                                        } ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Ano Construção</span>
                                                <span class="type-value"><?php echo $ano ?> - Imóvel <?php echo $condicao ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Total de Visitas</span>
                                                <span class="type-value">65</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Corretor</span>
                                                <span class="type-value"><?php echo $nomeCorretor ?></span>
                                            </li>
                                        </ul>
                                        <ul class="right-table">
                                            <li>
                                                <span class="type-name">Área</span>
                                                <span class="type-value"><?php echo $area ?> m²</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Quartos</span>
                                                <span class="type-value"><?php echo $quartos ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Banheiros</span>
                                                <span class="type-value"><?php echo $banheiros ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Suítes</span>
                                                <span class="type-value"><?php echo $suites ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Garagens</span>
                                                <span class="type-value"><?php echo $garagens ?></span>
                                            </li>
                                            <li>
                                                <span class="type-name">Piscina</span>
                                                <span class="type-value"><?php echo $piscinas ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="tab-desc">
                                        <p><?php echo $descricao ?></p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="tab-details">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($imagemPlanta != "sem-img.jpg") {?>

                    <div class="pd-widget">
                        <h4>Planta do Imóvel</h4>
                        <img src="sistema/img/imoveis/<?php echo $imagemPlanta ?>" alt="">
                    </div>

                    <?php }?>


               

                    <div class="pd-widget">
                        <h4>Deseja Visitar?</h4>
                        <form method="post" class="review-form">
                            <div class="group-input">
                                <input type="text" name="nome" placeholder="Nome">
                                <input id="telefone" name="telefone" type="text" placeholder="Telefone">
                                <input type="email" name="email" placeholder="Email">
                                
                                <input type="hidden" value="<?php echo $emailCorretor ?>" name="emailCorretor">

                            </div>
                            <textarea name="comentario" placeholder="Comentário"></textarea>
                            <div class="rating">
                                <span>Avaliações:</span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <button id="btn-enviar" type="submit" class="site-btn">Enviar</button>
                        </form>
                                <small><div id="mensagem-email" align="center">                 
                        </div></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="property-sidebar">
                    <div class="single-sidebar">
                        <div class="section-title sidebar-title">
                            <h5>Corretor</h5>
                        </div>
                        <div class="top-agent">
                            <div class="ta-item">
                                <div class="ta-pic set-bg" data-setbg="sistema/img/profiles/<?php echo $imgCorretor ?>"></div>
                                <div class="ta-text">
                                    <h6><?php echo $nomeCorretor ?></h6>
                                    <span>Especialista em Imóveis</span>
                                    <div class="ta-num"><a class="cor-verde-template-link" target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $telefoneCorretor ?>"><i class="fa fa-whatsapp mr-1"></i><?php echo $telefoneCorretor ?></a></div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="single-sidebar slider-op">
                        <div class="section-title sidebar-title">
                            <h5>Imóveis Relacionados</h5>
                        </div>
                        <div class="sf-slider owl-carousel">

                               <?php 
          $res = $pdo->query("SELECT * FROM imoveis where tipo = '" . $tipo . "' and status = '" . $status . "' order by id desc LIMIT 4 ");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

           
            $imagem2 = $dados[$i]['img_principal'];
            $valor2 = $dados[$i]['valor'];
            $titulo2 = $dados[$i]['titulo'];
            $id = $dados[$i]['id'];

            ?>

                            
                            <a href="imovel-detalhes.php?id=<?php echo $id ?>">
                                <div class="sf-item set-bg" data-setbg="sistema/img/imoveis/<?php echo $imagem2 ?>">
                                    <div class="sf-text">
                                        <h5><?php echo $titulo2 ?></h5>
                                        <span>R$ <?php echo number_format($valor, 2, ',', '.'); ?></span>
                                    </div>
                                </div>
                            </a>

                            <?php  }
                                
                            ?>


                        </div>
                    </div>

                    <div class="single-sidebar slider-op">
                        <div class="section-title sidebar-title">
                            <h5>Tipos de Imóveis</h5>
                        </div>
                        <div class="sf-slider owl-carousel">


                             <?php 
          $res = $pdo->query("SELECT * FROM tipos order by imoveis desc");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

           
                $titulo2 = $dados[$i]['nome'];
                $id2 = $dados[$i]['id'];
                $quant = $dados[$i]['imoveis'];
                $imagem2 = $dados[$i]['imagem'];

                

            ?>

                           


                            <div class="sf-item set-bg" data-setbg="sistema/img/imoveis/<?php echo $imagem2 ?>">
                                <div class="sf-text">
                                    <h5><?php echo $titulo2 ?>></h5>
                                    <span><?php echo $quant ?> Imóveis</span>
                                </div>
                            </div>
                            <?php  
                                }
                           ?>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property Details Section End -->



<?php 
include_once("rodape.php");
 ?> 






<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#btn-enviar').click(function (event) {
            $('#mensagem-email').addClass('text-info')
            $('#mensagem-email').text("Enviando!!")
            event.preventDefault();
            
            $.ajax({
                url: "enviar-email.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    $('#mensagem-email').removeClass()

                    if (mensagem.trim() === "Enviado com Sucesso!") {
                        $('#mensagem-email').addClass('text-success')
                        $('#mensagem-email').text(mensagem)
                    } else {

                        $('#mensagem-email').addClass('text-danger')
                        $('#mensagem-email').text("Você precisa está com o site hospedado para fazer envio de Emails")
                       
                    }

                    

                },

            })
        })
    })
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="js/mascara.js"></script>
