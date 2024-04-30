<?php 

include_once("../../conexao.php");
$pag = "movimentacoes";

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
                        <th>Movimento</th>
                        <th>Valor</th>
                        <th>Tesoureiro</th>
                        <th>Data</th>


                    </tr>
                </thead>

                <tbody>

                     <?php 

                  $query = $pdo->query("SELECT * FROM movimentacoes order by id desc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      $data = $res[$i]['data'];
                      $valor = $res[$i]['valor'];
                      $tesoureiro = $res[$i]['tesoureiro'];
                      $tipo = $res[$i]['tipo'];
                      $movimento = $res[$i]['movimento'];
                      

                      $data = implode('/', array_reverse(explode('-', $data)));
                      $valor = number_format($valor, 2, ',', '.');
                     
                     $res_2 = $pdo->query("SELECT * FROM tesoureiros where cpf = '" . $tesoureiro . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                               
                    @$nomeTesoureiro = $dados_2[0]['nome'];
                                        

                      ?>


                    <tr>
                        <td><?php echo $tipo ?></td>
                        <td><?php echo $movimento ?></td>
                        <td>R$ <?php echo $valor ?></td>
                        <td><?php echo $nomeTesoureiro ?></td>
                        <td><?php echo $data ?></td>



                    </tr>

                   <?php } ?>




                </tbody>
            </table>
        </div>


      <?php 

//Totalizando valores
$query = $pdo->query("SELECT * FROM movimentacoes where data = curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++) { 
  foreach ($res[$i] as $key => $value) {
  }
  if ($res[$i]['tipo']=="Entrada") {  
    @$entradas = @$entradas + $res[$i]['valor'];
    
}else{
    @$saidas = @$saidas + $res[$i]['valor'];
    
}

@$total = @$entradas - @$saidas;
if ($total < 0) {
    $classeValor = "text-danger";
    $classeValor2 = "border-left-danger";

} else {
    $classeValor = "text-success";
    $classeValor2 = "border-left-success";
}

}
$valorTotal = number_format(@$total, 2, ',', '.');
@$valorEntradas = number_format($entradas, 2, ',', '.');
@$valorSaidas = number_format($saidas, 2, ',', '.');

       ?>
        <hr class="mt-4">
        <span class="text-muted"><small>Movimentações de Hoje</small></span>
        <hr class="mb-2">

        <div class="row ">
            <div class="col-md-9">
                <span class="mr-4 text-success">Entradas: <?php echo $valorEntradas ?></span> 
                <span class="text-danger">Saídas: <?php echo $valorSaidas ?></span>

            </div>
            <div class="col-md-3">
                <span class="<?php echo $classeValor ?> mr-4">Total: <?php echo $valorTotal ?></span> 

            </div>
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