<?php 

include_once("../../conexao.php");

$cpfUsuario = $_SESSION['cpf_usuario'];


//Trazer total de imóveis cadastrados
$res_todos = $pdo->query("SELECT * FROM imoveis where status = 'Para Venda' or status = 'Para Aluguel'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalImoveis = count($dados_total);


    //Trazer total de visitas para hoje
$res_todos = $pdo->query("SELECT * FROM tarefas where id_imovel != '' and data = curDate()");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalVisitas = count($dados_total);


    //Trazer total de corretores cadastrados
$res_todos = $pdo->query("SELECT * FROM corretores");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalCorretores = count($dados_total);

  //Totalizando valores
$query = $pdo->query("SELECT * FROM movimentacoes where data = curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++) { 
  foreach ($res[$i] as $key => $value) {
  }
  if ($res[$i]['tipo']=="Entrada") {  
    @$entradas = @$entradas + $res[$i]['valor'];
    @$valorEntradas = number_format($entradas, 2, ',', '.');
}else{
    @$saidas = @$saidas + $res[$i]['valor'];
    @$valorSaidas = number_format($saidas, 2, ',', '.');
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
?>



<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Imóveis Cadastrados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalImoveis ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card <?php echo $classeValor2 ?> shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold <?php echo $classeValor ?> text-uppercase mb-1">Saldo do Dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$valorTotal ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x <?php echo $valorTotal ?>"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Visitas para Hoje</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalVisitas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Corretores</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalCorretores ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">

    <!-- Início dos cards -->

    <?php 
    $query = $pdo->query("SELECT * FROM imoveis where status = 'Para Venda' or status = 'Para Aluguel' order by id desc limit 4");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }


      $imagem = $res[$i]['img_banner']; 
      $valor = $res[$i]['valor']; 
      $titulo = $res[$i]['titulo']; 
      $bairro = $res[$i]['bairro']; 
      $area = $res[$i]['area']; 
      $quartos = $res[$i]['quartos']; 
      $banheiros = $res[$i]['banheiros']; 
      $garagens = $res[$i]['garagens']; 
      $corretor = $res[$i]['corretor']; 
      $id = $res[$i]['id']; 
      $status = $res[$i]['status']; 



      $valor = number_format($valor, 2, ',', '.');

      $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '$corretor'");
      $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
      $nomeCorretor = $dados_2[0]['nome'];
      $telefoneCorretor = $dados_2[0]['telefone'];
      $imgCorretor = $dados_2[0]['foto'];


      $res_2 = $pdo->query("SELECT * FROM bairros where id = '$bairro'");
      $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);            
      $nomeBairro = $dados_2[0]['nome'];

      if ($status == "Para Venda") {
        $classe = "c-red";
    } else {
        $classe = "";
    }
    ?>



    <div class="col-lg-3 col-md-4 col-md-12 mb-4">

        <img width="245" height="160" src="../img/imoveis/<?php echo $imagem ?>">

      <div class="mt-2">
        <span class="text-dark"><?php echo $titulo ?></span><br>
        <span class="text-success">R$ <?php echo $valor ?></span>



        <div class="row mt-3">
            <div class="col-md-3">
                <img class="rounded-circle" width="50" src="../img/profiles/<?php echo $imgCorretor ?>" alt="">
            </div>
            <div class="col-md-9">
                <span><?php echo $nomeCorretor ?></span><br>
                <span class="text-muted"><small><?php echo $telefoneCorretor ?></small></span>
            </div>


        </div>



    </div>
</div>


<?php } ?>

<!-- Fim dos Cards com os Imóveis -->   

</div>                   