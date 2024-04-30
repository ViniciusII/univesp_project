<?php 

include_once("../../conexao.php");
$pag = "tarefas";

?>





<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Corretor</th>

                    </tr>
                </thead>

                <tbody>

                      <?php 

                    $query = $pdo->query("SELECT * FROM tarefas order by id desc ");
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
                                $corretor = $res[$i]['corretor'];


                         $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '$corretor'");
            $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
            $nomeCorretor = $dados_2[0]['nome'];

              $dataSeparada = implode('/', array_reverse(explode('-', $data)));

                     ?>

                  

                    <tr>
                        <td><?php echo $titulo ?></td>
                        <td><?php echo $descricao ?></td>
                        <td><?php echo $dataSeparada ?></td>
                        <td><?php echo $hora ?></td>
                        <td><?php echo $nomeCorretor ?></td>



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