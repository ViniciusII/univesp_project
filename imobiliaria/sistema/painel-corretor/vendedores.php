<?php 

include_once("../../conexao.php");
$pag = "vendedores";
$cpfUsuario = $_SESSION['cpf_usuario'];
?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Vendedor</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>




<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                  <?php 

                  $query = $pdo->query("SELECT * FROM vendedores where corretor = '" . $cpfUsuario . "' order by id desc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $nome = $res[$i]['nome'];
                      
                      $id = $res[$i]['id'];

                      $cpf = $res[$i]['doc'];
                      $telefone = $res[$i]['telefone'];
                      $tipo = $res[$i]['tipo_pessoa'];
                      $endereco = $res[$i]['endereco'];

                      ?>



                    <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $tipo ?></td>
                        <td><?php echo $cpf ?></td>
                        <td><?php echo $telefone ?></td>

                        <td><?php echo $endereco ?></td>

                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
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
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM vendedores where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome2 = $res[0]['nome'];
                    $cpf2 = $res[0]['doc'];
                      $telefone2 = $res[0]['telefone'];
                      $tipo = $res[0]['tipo_pessoa'];
                      $endereco2 = $res[0]['endereco'];

                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label >Nome</label>
                        <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome2" placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <label >Tipo</label>
                        <select class="form-control" id="tipo" name="tipo2">

                            <?php
                                if (@$_GET['id'] != null) {
                                    $tipobd = "";
                                    if ($tipo == "Fisica") {
                                        $tipobd = "Pessoa Física";
                                    } else {
                                        $tipobd = "Pessoa Jurídica";
                                    }?>

                            <option value="<?php echo $tipo ?>"><?php echo $tipobd ?></option>

                            <?php } ?>

                            <?php if (@$tipo2!="Fisica") { ?>
                            <option value="Fisica">Pessoa Física</option>
                            <?php } ?>

                            <?php if (@$tipo2!="Juridica") { ?>
                            <option value="Juridica">Pessoa Jurídica</option>
                            <?php } ?>



                        </select>
                    </div>

                    <div class="form-group" id="divcpf">
                        <label >CPF</label>
                        <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf2" placeholder="CPF">
                    </div>

                    <div class="form-group" id="divcnpj">
                        <label >CNPJ</label>
                        <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cnpj" name="cnpj2" placeholder="CNPJ">
                    </div>

                    <div class="form-group">
                        <label >Telefone</label>
                        <input value="<?php echo @$telefone2 ?>" type="text" class="form-control" id="telefone" name="telefone2" placeholder="Telefone">
                    </div>

                    <div class="form-group">
                        <label >Endereço</label>
                        <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco2" placeholder="Endereço">
                    </div>

                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 

                </div>



                <div class="modal-footer">



                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">

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



<!-- Script para mostrar div do slider aluguel/compra -->
<script type="text/javascript">
    $(document).ready(function () {
        var tipo = "<?=$tipo?>";
        if (tipo === "Juridica") {
            $('#divcpf').hide();
            $('#divcnpj').show();
        } else {
            $('#divcpf').show();
            $('#divcnpj').hide();
        }

        $('#tipo').change(function () {
            if ($(this).val() == 'Fisica') {
                $('#divcpf').show();
                $('#divcnpj').hide();
            } else {
                $('#divcpf').hide();
                $('#divcnpj').show();
            }


        });

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