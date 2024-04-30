<?php 

include_once("../../conexao.php");
$pag = "imoveis-vendas";

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
                        <th>Código</th>
                        <th>Corretor</th>
                        <th>Título</th>
                        <th>Valor</th>

                        <th>Vender Imóvel</th>
                    </tr>
                </thead>

                <tbody>

                     <?php 

                  $query = $pdo->query("SELECT * FROM vendas where pago = 'Não' order by id  ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      $id_imovel = $res[$i]['imovel'];
                      $corretor = $res[$i]['corretor'];
                      $valor = $res[$i]['valor'];
                      $id = $res[$i]['id'];

                     
                      $valor = number_format($valor, 2, ',', '.');
                     

                       $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '" . $corretor . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                     @$nomeCorretor = $dados_2[0]['nome'];


                    $res_2 = $pdo->query("SELECT * FROM imoveis where id = '" . $id_imovel . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                    @$titulo = $dados_2[0]['titulo'];

                    
                                        

                      ?>

                   
                    <tr>
                        <td><?php echo $id_imovel ?></td>
                        <td><?php echo $nomeCorretor ?></td>
                        <td><?php echo $titulo ?></td>
                        <td>R$ <?php echo $valor ?></td>

                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=modal&id=<?php echo $id ?>&idimov=<?php echo $id_imovel ?>" class='text-primary mr-1' title='Vender Imóvel'><i class='far fa-check-square'></i></a>

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
                <h5 class="modal-title">Dados para Venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" >
                <div class="modal-body">



                    <div class="form-group">
                        <label >Comprador</label>
                        <select class="form-control" name="vendedor" id="vendedor">

                            <?php
                                $id_imovel = $_GET["idimov"];
                                $id = $_GET["id"];
                                
                                $res_2 = $pdo->query("SELECT * FROM imoveis where id = '" . $id_imovel . "' ");
                                 $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                                 @$cpfCorretor = $dados_2[0]['corretor'];

                                echo"<option value='0'>Selecionar Comprador</option>";

                                 $query = $pdo->query("SELECT * FROM compradores where corretor = '" . $cpfCorretor . "' order by id desc limit 30 ");

                                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      echo "<option value='" . $res[$i]['id'] . "'>" . $res[$i]['nome'] . "</option>";

                  }

                               ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <label >CPF/CNPJ Comprador</label>
                        <div class="input-group">
                            <input type="text" class="form-control small" placeholder="CPF/CNPJ" name="doc" id="doc" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="btn-buscar" name="btn-buscar" class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <label >Nome Comprador</label>
                        <input readonly type="text" name="nomeVendedor" id="nomeVendedor" class="form-control" placeholder="Nome Comprador">
                    </div>




                    <div class="form-group" id="divcpf">
                        <label >Data Pgto</label>
                        <input type="date" class="form-control" id="datapgto" name="datapgto">
                    </div>






                    <div align="center" id="mensagem_excluir" class="">

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>

                    
                    <input type="hidden" id="id"  name="id" value="<?php echo $_GET['id'] ?>" required>


                    <button type="button" id="btn-salvar" name="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>




<?php if (@$_GET["funcao"] != null && @$_GET["funcao"] == "modal") {
        echo "<script>$('#modal').modal('show');</script>";
    }

?>               

                 




<!--AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
       var pag = "<?=$pag?>";
        $('#btn-salvar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/vender.php",
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




<!--AJAX PARA LISTAR OS DADOS DO VENDEDOR -->
<script type="text/javascript">
    $(document).ready(function () {

        //$('#btn-buscar').click();
       var pag = "<?=$pag?>";

        $.ajax({
            url: pag + "/buscar-vendedor.php",
            method: "post",
            data: $('#frm').serialize(),
            dataType: "html",
            success: function (result) {
                console.log(result);
                document.getElementById('nomeVendedor').value = result;
            }
        })


    })
</script>



<!--AJAX PARA BUSCAR DADOS PELO BOTÃO -->
<script type="text/javascript">

    $('#btn-buscar').click(function (event) {
        var pag = "<?=$pag?>";

        event.preventDefault();
        $.ajax({
            url: pag + "/buscar-vendedor.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {
                console.log(result);
                var resultado = result.split(",");

                if (result == 0) {
                    document.getElementById('nomeVendedor').value = "";
                    document.getElementById('doc').value = "";
                    document.getElementById('btn-salvar').disabled = true;
                } else {
                    document.getElementById('nomeVendedor').value = resultado[0];
                    document.getElementById('doc').value = resultado[1];
                    document.getElementById('btn-salvar').disabled = false;
                }

            }
        })
    })


</script>




<!-- Script para buscar pelo select -->
<script type="text/javascript">
    $(document).ready(function () {

        document.getElementById('doc').value = "";
        document.getElementById('btn-salvar').disabled = true;

        $('#vendedor').change(function () {


            if ($(this).val() === '0') {
                document.getElementById('doc').value = "";
                document.getElementById('nomeVendedor').value = "";
                document.getElementById('btn-salvar').disabled = true;
            } else {
                document.getElementById('btn-salvar').disabled = false;
            }


            $('#btn-buscar').click();


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