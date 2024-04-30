<?php 

include_once("../../conexao.php");
$pag = "receber";

$cpfUsuario = $_SESSION['cpf_usuario'];
$dataHoje = Date('Y-m-d');


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Cliente</th>
                        <th>Telefone</th>
                        <th>Corretor</th>
                        <th>Data PGTO</th>
                        <th>Dar Baixa</th>

                    </tr>
                </thead>

                <tbody>

                     <?php 

                  $query = $pdo->query("SELECT * FROM contas_receber where pago = 'Não' order by data asc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      $tipo = $res[$i]['tipo'];
                      $valor = $res[$i]['valor'];
                      $cliente = $res[$i]['cliente'];
                      $dataPgto = $res[$i]['data'];
                      $corretor = $res[$i]['corretor'];

                      $dataPgto = implode('/', array_reverse(explode('-', $dataPgto)));
                      $valor = number_format($valor, 2, ',', '.');


                      $res_2 = $pdo->query("SELECT * FROM compradores where doc = '" . $cliente . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                               
                    @$nomeCliente = $dados_2[0]['nome'];
                    @$telefoneCliente = $dados_2[0]['telefone'];


                     $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '" . $corretor . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                               
                    @$nomeCorretor = $dados_2[0]['nome'];
                    


                     if (@$minhaData > @$dataHoje) {
                                    $classe = "text-danger";
                                } else {
                                    $classe = "text-success";
                       }




                    

                      ?>

                    <tr>
                        <td><?php echo $tipo ?></td>
                        <td>R$ <?php echo $valor ?></td>
                        <td><?php echo $nomeCliente ?></td>
                        <td><?php echo $telefoneCliente ?></td>
                        <td><?php echo $nomeCorretor ?></td>
                        <td><?php echo $dataPgto ?></td>

                        <td align="center">
                           <a href="index.php?pag=<?php echo $pag ?>&funcao=baixa&id=<?php echo $id ?>&valor=<?php echo $valor ?>" class='<?php echo $classe ?> mr-1' title='Dar Baixa'><i class='far fa-check-square'></i></a>

                        </td>
                    </tr>

                   <?php } ?>





                </tbody>
            </table>
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

               
                <p>Este valor de <?php echo $_GET['valor'] ?>Reais já foi recebido por você?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">
                   <input type="hidden" id="id"  name="id" value="<?php echo $_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-success">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "baixa") {
    echo "<script>$('#modal').modal('show');</script>";
}

?>     





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
         var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/concluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Editado com Sucesso!!') {


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
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>