<?php 

include_once("../../conexao.php");
$pag = "pagar";

$cpfUsuario = $_SESSION['cpf_usuario'];
$dataHoje = Date('Y-m-d');
?>


<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Nova Conta</a>
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
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Tesoureiro</th>
                        <th>Data PGTO</th>
                        <th>Foto ou PDF</th>
                        <th>Dar Baixa</th>

                    </tr>
                </thead>

                <tbody>

                      <?php 

                  $query = $pdo->query("SELECT * FROM contas_pagar where pago = 'Não' order by data asc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      $titulo = $res[$i]['titulo'];
                      $valor = $res[$i]['valor'];
                      $descricao = $res[$i]['descricao'];
                      $dataPgto = $res[$i]['data'];
                      $tesoureiro = $res[$i]['tesoureiro'];
                      $foto = $res[$i]['foto'];

                      $dataPgto = implode('/', array_reverse(explode('-', $dataPgto)));
                      $valor = number_format($valor, 2, ',', '.');


                      $res_2 = $pdo->query("SELECT * FROM tesoureiros where cpf = '" . $tesoureiro . "'");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                    $linhas = count($dados_2);
                    if($linhas > 0){            
                    @$nomeTesoureiro = $dados_2[0]['nome'];
                    }

                      if ($dataPgto < $dataHoje) {
                                    $classe = "text-danger";
                                } else {
                                    $classe = "text-success";
                                }

                      ?>

                  
                    <tr>
                        <td><?php echo $titulo ?></td>
                        <td><?php echo $descricao ?></td>
                        <td>R$ <?php echo $valor ?></td>
                        <td><?php echo @$nomeTesoureiro ?></td>

                        <td><?php echo $dataPgto ?></td>

                        <td>
                            <?php
                            if($foto != null && $foto!=""){ ?>
                               
                            <a href="../img/contas/<?php echo $foto ?>" target="_blank" class="mr-2">Ver Arquivo</a>
                            
                            <?php }else{ ?>
                            Inserir
                             <?php } ?>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=foto&id=<?php echo $id ?>" class='text-primary mr-1' title='Inserir Foto ou PDF'><i class='far fa-image'></i></a>

                        </td>

                        <td align="center">
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=baixa&id=<?php echo $id ?>&valor=<?php echo $valor ?>" class='<?php echo $classe ?> mr-1' title='Dar Baixa'><i class='far fa-check-square'></i></a>

                             <?php if($res[$i]['pago'] != 'Sim' ){ ?>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <?php } ?>

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Inserir Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label >Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo6" placeholder="Título">
                    </div>


                    <div class="form-group">
                        <label >Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao6" placeholder="Descrição">
                    </div>

                    <div class="form-group">
                        <label >Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor6" placeholder="Valor">
                    </div>



                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 

                </div>



                <div class="modal-footer">




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


<div class="modal" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Baixar Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
                <p>Este valor de <?php echo $_GET['valor'] ?> Reais já foi pago por você?</p>

                <div align="center" id="mensagem_concluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-concluir">Cancelar</button>
                <form method="post">
                   
                    <input type="hidden" id="id"  name="id" value="<?php echo $_GET['id'] ?>" required>

                    <button type="button" id="btn-concluir" name="btn-deletar" class="btn btn-success">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal" id="modal-imagens" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir Foto</h5>
                <button id="btn-fechar-imagens" type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form-img" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group">
                                <label>Foto ou PDF</label>
                                <input value="<%=foto%>" type="file" class="form-control-file" id="imagem" name="imagem" onchange="carregarImg();">

                            </div>

                        </div>

                        <div class="col-md-6" align="right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-imagem">Cancelar</button>
                            
                            <input type="hidden" id="id"  name="id" value="<?php echo $_GET['id'] ?>" required>

                            <button type="submit" id="btn-principal" name="btn-imagem" class="btn btn-info">Salvar</button>

                        </div>

                    </div>

                    <div class="col-md-12 mb-2">
                        <img src="../img/contas/<?php echo $foto ?>" alt="Carregue sua Imagem ou PDF" id="target" width="100%">
                    </div>


                    <div align="center" id="mensagem_img" class="">

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>           



<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

?>



<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}

?> 


<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "baixa") {
    echo "<script>$('#modal').modal('show');</script>";
}

?>               


<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "foto") {
    echo "<script>$('#modal-imagens').modal('show');</script>";
}

?>




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


<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-concluir').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/concluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Editado com Sucesso!!') {


                        $('#btn-cancelar-concluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_concluir').text(mensagem)



                },

            })
        })
    })
</script>





<!--AJAX PARA EXECUTAR A EDIÇÃO DA IMAGEM DA FOTO -->
<script type="text/javascript">


    $("#form-img").submit(function () {

         var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/imagem.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem_img').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#mensagem_img').addClass('text-success');
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-cancelar-imagem').click();
                    window.location = "index.php?pag=" + pag;

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



<script type="text/javascript">
 function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[id=imagem]").files[0];
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



<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>