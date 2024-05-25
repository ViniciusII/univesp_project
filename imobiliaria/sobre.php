<?php 

include_once("conexao.php");
include_once("cabecalho.php");

 ?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Liberty Place</h4>
                        <div class="bt-option">
                            <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                            <span>Sobre</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="at-title">
                            <h3>Bem vindo a Liberty Place</h3>
                            <p>A Liberty Place oferece a liberdade e praticidade que você necessita em seu dia a dia. </p>
                        </div>
                        <div class="at-feature">
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="img/chooseus/chooseus-icon-1.png" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Os melhores imóveis</h6>
                                    <p>As melhores opções na cidade</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="img/chooseus/chooseus-icon-2.png" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Seu aluguel ou sua compra facilita</h6>
                                    <p>Encontre as melhores opções na sua região</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="img/chooseus/chooseus-icon-3.png" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Suporte Especilizados</h6>
                                    <p>O melhor suporte que você precisa</p>
                                </div>
                            </div>
                            <div class="af-item">
                                <div class="af-icon">
                                    <img src="img/chooseus/chooseus-icon-4.png" alt="">
                                </div>
                                <div class="af-text">
                                    <h6>Melhores Localizações</h6>
                                    <p>As melhores propriedades da região</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic set-bg" data-setbg="img/about-us.jpg">
                        <a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup">
                            <i class="fa fa-play-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

  
<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="section-title">
                    <h4>Destaques de suporte</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="team-btn">
                    <a href="corretores.php"><i class="fa fa-user"></i> Ver Todos</a>
                </div>
            </div>
        </div>
        <div class="row">

             <?php 
          $res = $pdo->query("SELECT * FROM corretores order by id desc limit 3");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

            $id = $dados[$i]['id'];
             $nome = $dados[$i]['nome'];
                        $descricao = $dados[$i]['descricao'];
                        $telefone = $dados[$i]['telefone'];
                        $email = $dados[$i]['email'];
                        $twitter = $dados[$i]['twitter'];
                        $facebook = $dados[$i]['facebook'];
                        $imagem = $dados[$i]['foto'];
                        

            ?>

           
            <div class="col-md-4">
                <div class="ts-item">
                    <div class="ts-text">
                        <img src="sistema/img/profiles/<?php echo $imagem ?>" alt="">
                        <h5><?php echo $nome ?></h5>
                        <span><i class="fa fa-whatsapp mr-1"></i><?php echo $telefone ?></span>
                        <p><?php echo $descricao ?></p>
                        <div class="ts-social">
                            <a target="_blank" href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" title="<?php echo $email ?>" href="<?php echo $email ?>"><i class="fa fa-envelope-o"></i></a>
                            <a target="_blank" title="<?php echo $telefone ?>" href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $telefone ?>"><i class="fa fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <?php  }
               ?>


        </div>
    </div>
</section>
<!-- Team Section End -->


   
    <!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Alguns de nossos Clientes</h4>
                </div>
            </div>
        </div>
        <div class="row testimonial-slider owl-carousel">
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Encontrei a melhor casa no bairro que eu queria, consegui contato diretamente com o dono o que me poupou tempo. </p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-1.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Tive a facilidade de encontrar uma casa proxima ao meu trabalho.</p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-2.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Consegui ver todas as opções que eu tinha pelo meu computador sem precisar me locomover e ainda tive um suporte do time sem comparações</p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-1.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

 <?php 
include_once("rodape.php");
 ?> 

