<?php 

include_once("../conexao.php");
@session_start();
 ?>
 

   <?php 
   //verificar se existe usuário cadastrado no BD
          $res = $pdo->query("SELECT * FROM usuarios");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          if(@count($dados) == 0){
            $pdo->query("INSERT into usuarios (nome, cpf, email, senha, nivel, foto) values ('Administrador', '000.000.000-00' , '" . $email . "' , '123', 'admin', 'sem-foto.jpg')");
          }

?>





<title>ACESSO RESTRITO</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="icon" href="images/favicon-nova.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/login.css" type="text/css">
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">


 <link rel="shortcut icon" href="../img/favicon0.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon0.ico" type="image/x-icon">
    
    
<div class="main">


    <div class="container">
        <center>
            <div class="middle">
                <div id="login">

                    <form action="" method="post">

                        <fieldset class="clearfix">

                            <p ><span class="fa fa-user"></span><input type="email" name="email" Placeholder="Email" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                            <p><span class="fa fa-lock"></span><input type="password" name="senha" Placeholder="Senha" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

                            <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#" data-toggle="modal" data-target="#modal-rec"><small>Recuperar
                                        Senha?</small></a></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><small><input type="submit" value="Logar"></small></span>
                            </div>

                            <p align="center" class="texto-alerta mt-2">

                                <?php 
                                $res = $pdo->query("SELECT * FROM usuarios where email = '" . @$_POST['email'] . "' and senha = '" . @$_POST['senha'] . "'");
                                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                                

                                

                                if (@$_POST['email'] == null || @$_POST['senha'] == null) {
                                        echo("Preencha os Dados");

                                    } else {

                                        if (@count($dados) > 0) {

                                            $_SESSION['nome_usuario'] = $dados[0]['nome'];
                                $_SESSION['email_usuario'] = $dados[0]['email'];
                                $_SESSION['nivel_usuario'] = $dados[0]['nivel'];
                                $_SESSION['cpf_usuario'] = $dados[0]['cpf'];
                                 $_SESSION['id_usuario'] = $dados[0]['id'];
                                 
                                            
                                            if($_SESSION['nivel_usuario'] == "admin"){
                                               echo "<script language='javascript'>window.location='painel-admin'; </script>";
                                            }
                                            
                                            if($_SESSION['nivel_usuario'] == "corretor"){
                                               echo "<script language='javascript'>window.location='painel-corretor'; </script>";
                                            }

                                            if($_SESSION['nivel_usuario'] == "tesoureiro"){
                                               echo "<script language='javascript'>window.location='painel-tesouraria'; </script>";
                                            }
                                            
                                        } else {
                                            echo "Dados Incorretos";
                                        }
                                    }
                                 ?>
                               
                            </p>

                        </fieldset>
                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
                <div class="logo">
                    
                    <img src="img/logo_branco.png" weidth="150" height="150">

                    <div class="clearfix"></div>
                </div>

            </div>
        </center>
    </div>

</div>





<div class="modal fade" id="modal-rec" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recuperar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post">



        <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Digite seu Email</label>
            <input type="email" class="form-control" id="email-recuperar" name="email-recuperar" placeholder="Email" required>

        </div>




        <div align="center" class="" id="mensagem2">
        </div>


    </div>
    <div class="modal-footer">
     <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     <button name="btn-rec" id="btn-rec" class="btn btn-info">Recuperar</button>

 </form>

</div>
</div>
</div>
</div>




<!--AJAX PARA RECUPERAR A SENHA -->
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#btn-rec').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url: "recuperar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem2').removeClass()

                    if(mensagem.trim() === 'Senha Enviada para o Email!'){
                        
                        $('#mensagem2').addClass('text-success')
                        $('#mensagem2').text(mensagem)

                        document.getElementById('username').value = document.getElementById('email-recuperar').value;

                       
                        $('#email-recuperar').val('')
                        

                        //$('#btn-fechar').click();
                        //location.reload();

                    }else if(mensagem.trim() === 'Este email não está cadastrado no site!'){
                     $('#mensagem2').addClass('text-danger');
                        //$('#mensagem2').text(mensagem)
                        $('#mensagem2').text(mensagem); 

                    }else{
                        
                        $('#mensagem2').addClass('text-danger');
                        //$('#mensagem2').text(mensagem)
                        $('#mensagem2').text("Você precisa está com o site hospedado para fazer envio de Emails")
                    }
                    
                    

                },
                
            })
        })
    })
</script>