<?php 

include_once("../../conexao.php");
@session_start();
 ?>

<?php 
    $idUsuario = $_SESSION['id_usuario'];
    $nivelUsuario = $_SESSION['nivel_usuario'];
    $cpfUsuario = $_SESSION['cpf_usuario'];

    $res = $pdo->query("SELECT * FROM usuarios where id = '" . $idUsuario . "' ");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
     $email = $dados[0]['email'];
     $senha = $dados[0]['senha'];
     $nome = $dados[0]['nome'];
     $cpf = $dados[0]['cpf'];
     $img = $dados[0]['foto'];
    

    $res2 = $pdo->query("SELECT * FROM corretores where cpf = '" . $cpfUsuario . "' ");
    $dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
     
     $descricao2 = $dados2[0]['descricao'];
     $twitter = $dados2[0]['twitter'];
     $facebook = $dados2[0]['facebook'];
     $endereco = $dados2[0]['endereco'];
     $telefone = $dados2[0]['telefone'];


      if ($nivelUsuario == null || $nivelUsuario!="corretor") {
         echo "<script language='javascript'>window.location='../index.php'; </script>";
    }


    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "cliente-compra";
    $menu2 = "vendedores";
    $menu3 = "imoveis";
    $menu4 = "tarefas";

 ?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Hugo Vasconcelos">

        <title>Painel Corretor</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <link rel="shortcut icon" href="../../img/favicon0.ico" type="image/x-icon">
        <link rel="icon" href="../../img/favicon0.ico" type="image/x-icon">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                    <div class="sidebar-brand-text mx-3">Corretor</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Cadastros
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>Pessoas</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">PESSOAS:</h6>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu1 ?>">Compradores</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu2 ?>">Vendedores</a>
                        </div>
                    </div>
                </li>
                
                
                
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pag=<?php echo $menu3 ?>">
                        <i class="fas fa-home"></i>
                        <span>Imóveis</span></a>
                </li>

               

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Agenda
                </div>



                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pag=<?php echo $menu4 ?>">
                        <i class="fas fa-calendar-check"></i>
                        <span>Tarefas</span></a>
                </li>

               

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nome ?></span>
                                    <img class="img-profile rounded-circle" src="../img/profiles/<?php echo $img ?>">

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                        Editar Perfil
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                         <?php if ($pag == null) { 
                        include_once("home.php"); 
                        
                        } else if ($pag==$menu1) {
                        include_once($menu1.".php");
                        
                        } else if ($pag==$menu2) {
                        include_once($menu2.".php");

                         } else if ($pag==$menu3) {
                        include_once($menu3.".php");

                        } else if ($pag==$menu4) {
                        include_once($menu4.".php");

                      
                        
                        } else {
                        include_once("home.php");
                        }
                        ?>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




      <!--  Modal Perfil-->
        <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>



                   <form id="form-perfil" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Nome</label>
                                                <input value="<?php echo $nome ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >CPF</label>
                                                <input value="<?php echo $cpf ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input value="<?php echo $email ?>" type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Senha</label>
                                                <input value="<?php echo $senha ?>" type="password" class="form-control" id="text" name="senha" placeholder="Senha">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Endereço</label>
                                                <input value="<?php echo $endereco ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Telefone</label>
                                                <input value="<?php echo $telefone ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Facebook</label>
                                                <input value="<?php echo $facebook ?>" type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Link">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label >Twitter</label>
                                                <input value="<?php echo $twitter ?>" type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Link">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label >Descrição</label>
                                        <textarea maxlength="80" type="text" class="form-control" id="descricao" name="descricao" ><?php echo $descricao2 ?> </textarea>
                                    </div>        








                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="col-md-12 form-group">
                                        <label>Foto</label>
                                        <input value="<?php echo $img ?>" type="file" class="form-control-file" id="imagem" name="imagem" onchange="carregarImg();">

                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <img src="../img/profiles/<?php echo $img ?>" alt="Carregue sua Imagem" id="target" width="100%">
                                    </div>
                                </div>
                            </div> 



                            <small>
                                <div id="mensagem" class="mr-4">

                                </div>
                            </small>



                        </div>
                        <div class="modal-footer">



                            <input value="<?php echo $idUsuario ?>" type="hidden" name="txtid" id="txtid">
                            <input value="<?php echo $cpf ?>" type="hidden" name="antigo" id="antigo">

                            <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

    </body>

</html>




<!--SCRIPT PARA SUBIR IMAGEM PARA O SERVIDOR -->
<script type="text/javascript">

                                            function carregarImg() {

                                                var target = document.getElementById('target');
                                                var file = document.querySelector("input[type=file]").files[0];
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




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form-perfil").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-perfil.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php";

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>