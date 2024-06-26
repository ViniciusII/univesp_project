<?php 
include_once("config.php");
 ?>
<!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="fs-about">
                        <div class="fs-logo">
                            <a href="#">
                                <img src="img/logo_branco.png" alt="">
                            </a>
                        </div>
                        <p>Nos preocupamos em trazer as melhores oportunidades de negocios com segurança para o seu bem estar</p>
                    <?php if(isset($_GET['id']) && $_GET['id'] == null){ ?>
                        <div class="fs-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsappLink ?>"> <i class="fa fa-whatsapp"></i></a>
                        </div>
                    <?php }else{ ?>
                        <div class="mt-2">
                            <a href="#"><i class="fa fa-facebook text-light mr-2"></i></a>
                            <a href="#"><i class="fa fa-twitter text-light mr-2"></i></a>
                            <a href="#"><i class="fa fa-youtube-play text-light mr-2"></i></a>
                            <a href="#"><i class="fa fa-instagram text-light mr-2"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p text-light mr-2"></i></a>
                            <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsappLink ?>"> <i class="fa fa-whatsapp text-light mr-2"></i></a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fs-widget">
                        <h5>Links</h5>
                        <ul>
                            <li><a href="#">Contatos</a></li>
                            <li><a href="#">Imóveis</a></li>
                            <li><a href="#">Corretores</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li><a href="#">Home</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h5>Buscar Imóvel</h5>
                        <p>Digite o ID do Imóvel</p>
                        <form action="imovel-detalhes.php" method="get" class="subscribe-form">
                            <input type="text" name="id" placeholder="Id ou Código">
                            <button type="submit" class="site-btn">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.richtext.min.js"></script>
    <script src="js/image-uploader.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>