<?php 

include_once("../../conexao.php");
$pag = "alugueis";

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
                        <th>Valor Total</th>
                        <th>Corretor</th>
                        <th>R$ Corretor</th>
                        <th>R$ Imobiliária</th>
                        <th>Data</th>


                    </tr>
                </thead>

                <tbody>

                      <?php 

                  $query = $pdo->query("SELECT * FROM entradas where tipo = 'Aluguel' order by id desc  ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      
                      
                      $id = $res[$i]['id'];
                      $data = $res[$i]['data'];
                      $valor = $res[$i]['valor'];
                      $corretor = $res[$i]['corretor'];
                      $valorCorretor = $res[$i]['valor_corretor'];
                      $valorCaixa = $res[$i]['valor_caixa'];

                      $data = implode('/', array_reverse(explode('-', $data)));
                      $valor = number_format($valor, 2, ',', '.');
                      $valorCorretor = number_format($valorCorretor, 2, ',', '.');
                      $valorCaixa = number_format($valorCaixa, 2, ',', '.');

                       $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '" . $corretor . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                               
                    @$nomeCorretor = $dados_2[0]['nome'];
                                        

                      ?>

                    
                  
                    <tr>
                        <td>R$ <?php echo $valor ?></td>
                        <td><?php echo $nomeCorretor ?></td>
                        <td>R$ <?php echo $valorCorretor ?></td>
                        <td>R$ <?php echo $valorCaixa ?></td>
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