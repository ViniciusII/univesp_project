<?php 

include_once("../../conexao.php");

$cpfUsuario = $_SESSION['cpf_usuario'];


$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual."-".$mes_atual."-01";


$res_todos = $pdo->query("SELECT * FROM imoveis where (status = 'Para Venda' or status = 'Para Aluguel') and corretor = '" . $cpfUsuario . "'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalImoveis = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM vendas where corretor = '" . $cpfUsuario . "' and (data >= '" . $dataInicioMes . "' and data <= curDate())");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalVendasMes = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM tarefas where corretor = '" . $cpfUsuario . "' and data = curDate() ");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalTarefas = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM entradas where corretor = '" . $cpfUsuario . "' and (data >= '" . $dataInicioMes . "' and data <= curDate()) ");
$res = $res_todos->fetchAll(PDO::FETCH_ASSOC);
 for ($i=0; $i < @count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }
@$total = @$total + $res[$i]['valor'];
     

}
@$totalArrecadado = number_format(@$total, 2, ',', '.'); 

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
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Arrecadado</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalArrecadado ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
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
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tarefas Hoje</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalTarefas ?></div>
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
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vendas no mês</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalVendasMes ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="text-xs font-weight-bold text-secondary text-uppercase mt-4">Agenda do Dia</div>
<hr> 

<div class="row">

    <?php 
    $res_todos = $pdo->query("SELECT * FROM tarefas where corretor = '" . $cpfUsuario . "' and data = curDate() order by hora asc  ");
$res = $res_todos->fetchAll(PDO::FETCH_ASSOC);
 for ($i=0; $i < @count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
                $titulo = $res[$i]['titulo'];
                $descricao = $res[$i]['descricao'];
                $hora = $res[$i]['hora'];
                $status = $res[$i]['status'];

                if ($status == "") {
                    $classe1 = "text-danger";
                    $classe2 = "border-left-danger";
                } else {
                    $classe1 = "text-success";
                    $classe2 = "border-left-success";
                }
      }
     ?>

  
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card <?php echo $classe2 ?>shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold  <?php echo $classe1 ?> text-uppercase"><?php echo $titulo ?></div>
                        <div class="text-xs text-secondary"><?php echo $descricao ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x  <?php echo $classe1 ?>"></i><br>
                        <span class="text-xs"><?php echo $hora ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</div>

