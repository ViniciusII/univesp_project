<?php 

include_once("../../conexao.php");
$pag = "alugueis";

?>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Imóvel</th>
                        <th>Corretor</th>
                        <th>Valor</th>
                        <th>Ativo</th>
                        <th>Data</th>

                    </tr>
                </thead>

                <tbody>

                      <?php 

                    $query = $pdo->query("SELECT * FROM alugueis order by id desc");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                                                      
                                $id = $res[$i]['id'];
                                
                                $imovel = $res[$i]['imovel'];
                                $corretor = $res[$i]['corretor'];
                                $data = $res[$i]['data'];
                                $valor = $res[$i]['valor'];
                                $ativo = $res[$i]['ativo'];


                         $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '$corretor'");
            $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
            $nomeCorretor = $dados_2[0]['nome'];

              $dataSeparada = implode('/', array_reverse(explode('-', $data)));

              $valor = number_format($valor, 2, ',', '.');
                     ?>


                  
                    <tr>
                        <td><?php echo $imovel ?></td>
                        <td><?php echo $nomeCorretor ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $ativo ?></td>
                        <td><?php echo $dataSeparada ?></td>



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