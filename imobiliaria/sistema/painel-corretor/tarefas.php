<?php 

include_once("../../conexao.php");
$pag = "tarefas";
$cpfUsuario = $_SESSION['cpf_usuario'];
?>


<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Nova Tarefa</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>





<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Imóvel</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                     <?php 

                  $query = $pdo->query("SELECT * FROM tarefas where corretor = '" . $cpfUsuario . "' order by id desc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      $titulo = $res[$i]['titulo'];
                      $descricao = $res[$i]['descricao'];
                      $data = $res[$i]['data'];
                      $hora = $res[$i]['hora'];
                      $imovel = $res[$i]['id_imovel'];
                      $status = $res[$i]['status'];

                      $data = implode('/', array_reverse(explode('-', $data)));

                      if ($status=="") {
                                    $classe = "text-danger";
                                } else {
                                    $classe = "text-success";
                                }

                      ?>



                    <tr>
                        <td><i class="<?php echo $classe ?> mr-1 fas fa-square "></i><?php echo $titulo ?></td>
                        <td><?php echo $data ?></td>
                        <td><?php echo $hora ?></td>
                        <td><?php echo $imovel ?></td>



                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=concluir&id=<?php echo $id ?>" class='text-success mr-1' title='Concluir Tarefa'><i class='far fa-check-square'></i></a>
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

                    $query = $pdo->query("SELECT * FROM tarefas where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                     
                      $titulo5 = $res[0]['titulo'];
                      $descricao5 = $res[0]['descricao'];
                      $data5 = $res[0]['data'];
                      $hora5 = $res[0]['hora'];
                      $imovel5 = $res[0]['id_imovel'];
                      $status5 = $res[0]['status'];

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
                        <label >Titulo</label>
                        <input value="<?php echo @$titulo5 ?>" type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                    </div>

                    <div class="form-group">
                        <label >Descrição</label>
                        <input value="<?php echo @$descricao5 ?>" type="text" class="form-control" id="descricao" name="descricao5" placeholder="Descrição da Tarefa">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="divcpf">
                                <label >Data</label>
                                <input value="<?php echo @$data5 ?>" type="date" class="form-control" id="data" name="data">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group" id="divcnpj">
                                <label >Hora</label>
                                <input value="<?php echo @$hora5 ?>" type="time" class="form-control" id="hora" name="hora">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label >Código Imóvel (Se For Visita)</label>
                        <input value="<?php echo @$imovel5 ?>" type="text" class="form-control" id="imovel" name="imovel" placeholder="Id do Imóvel">
                    </div>



                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 

                </div>



                <div class="modal-footer">



                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$hora5 ?>" type="hidden" name="antigo1" id="antigo">
                 <input value="<?php echo @$data5 ?>" type="hidden" name="antigo2" id="antigo2">

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








<div class="modal" id="modal-concluir" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Concluir Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Concluir esta tarefa?</p>

                <div align="center" id="mensagem_concluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-concluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>


                    <button type="button" id="btn-concluir" name="btn-concluir" class="btn btn-danger">Concluir</button>
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
           


<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "concluir") {
    echo "<script>$('#modal-concluir').modal('show');</script>";
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




<!--AJAX PARA CONCLUIR TAREFA -->
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

                    if (mensagem.trim() === 'Excluído com Sucesso!!') {


                        $('#btn-cancelar-concluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_concluir').text(mensagem)



                },

            })
        })
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