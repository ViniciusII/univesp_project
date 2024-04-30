<?php 

include_once("../../conexao.php");
$pag = "saidas";

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
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Tesoureiro</th>
                        <th>Data</th>
                       


                    </tr>
                </thead>

                <tbody>

                     <?php 

                  $query = $pdo->query("SELECT * FROM saidas order by id desc  ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      
                      $data = $res[$i]['data'];
                      $valor = $res[$i]['valor'];
                      $tesoureiro = $res[$i]['tesoureiro'];
                      $descricao = $res[$i]['descricao'];

                      $data = implode('/', array_reverse(explode('-', $data)));
                      $valor = number_format($valor, 2, ',', '.');

                       $res_2 = $pdo->query("SELECT * FROM tesoureiros where cpf = '" . $tesoureiro . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                               
                    @$nomeTesoureiro = $dados_2[0]['nome'];
                                        

                      ?>

                  

                    <tr>
                        <td><?php echo $descricao ?></td>
                        <td>R$ <?php echo $valor ?></td>
                        <td><?php echo $nomeTesoureiro ?></td>
                       
                        <td><?php echo $data ?></td>



                    </tr>

                   <?php } ?>




                </tbody>
            </table>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>