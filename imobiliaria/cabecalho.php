<?php 
include_once("config.php");
 ?>

<!DOCTYPE html>


<html lang="pt-br">

    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Imobiliária Liberty Place - Os Melhores imóveis ...">
        <meta name="keywords" content="Locação e venda de imoveis na região de Leme-SP">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>libertyplace</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">


        <link rel="shortcut icon" href="img/favicon0.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon0.ico" type="image/x-icon">



    </head>

    <body>


        <!-- Page Preloder -->
        
        <div id="preloder">
            <div class="loader"></div>
        </div>
       

        <!-- Offcanvas Menu Wrapper Begin -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="canvas-close">
                <span class="icon_close"></span>
            </div>
            <div class="logo">
                <a href="./index.php">
                    <img src="img/logo_1.png" alt="">
                </a>
            </div>
            <div id="mobile-menu-wrap"></div>
            <div class="om-widget">
                <ul>
                    <li><i class="icon_mail_alt"></i> <?php echo $email; ?></li>
                    <li><a class="text-dark" target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsappLink; ?>"><i class="fa fa-whatsapp"></i> <?php echo $whatsapp; ?></a> <span><?php echo $telfixo; ?></span></li>
                </ul>
               <div class="col-lg-2">
                             <form action="imovel-detalhes.jsp" method="get">
                                   
                                    <div class="container2">  
                                        <input class="busca" type="search" id="busca" name="id" placeholder="Id do Imóvel">
                                        <button class="btnbusca" type="submit"><i class="fa fa-search"></i></button>
                                    </div>

                                </form>
                        </div>

            </div>
            <div class="om-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
        </div>
        <!-- Offcanvas Menu Wrapper End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <span class="btn-logar"><a href="sistema" target="_blank" class="text-secondary"><i class="fa fa-unlock d-none d-md-block"></a></i></span>
            <span class="btn-logar-mobile"><a href="sistema" target="_blank" class="text-secondary"><i class="fa fa-unlock d-block d-sm-none"></a></i></span>
            <div class="hs-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="./index.php"><img src="img/logo_1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ht-widget">
                                <ul>
                                    <li><i class="icon_mail_alt"></i> <?php echo $email; ?></li>
                                    <li><a class="text-dark" target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsappLink; ?>"><i class="fa fa-whatsapp"></i> <?php echo $whatsapp; ?> </a> <span><?php echo $telfixo; ?></span></li>
                                </ul>

                               

                            </div>
                        </div>

                        <div class="col-lg-2 d-none d-md-block">
                             <form action="imovel-detalhes.php" method="get">
                                   
                                    <div class="container2">  
                                        <input class="busca" type="search" id="busca" name="id" placeholder="Id do Imóvel">
                                        <button class="btnbusca" type="submit"><i class="fa fa-search"></i></button>
                                    </div>

                                </form>
                        </div>

                    </div>
                    <div class="canvas-open">
                        <span class="icon_menu"></span>
                    </div>
                </div>
            </div>
            <div class="hs-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <nav class="nav-menu">
                                <ul>
                                    <li class="active"><a href="./index.php">Home</a></li>
                                    <li><a href="imoveis.php">Imóveis</a></li>
                                    <li><a href="corretores.php">Corretores</a></li>
                                    <li><a href="vendedores.php">Vendedores</a></li>
                                    <li><a href="sobre.php">Sobre</a></li>

                                    <li><a href="contatos.php">Contatos</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="hn-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->