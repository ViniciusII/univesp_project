<?php 

include_once("../../conexao.php");

$cpfUsuario = $_SESSION['cpf_usuario'];

$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual."-".$mes_atual."-01";


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


$res_todos = $pdo->query("SELECT * FROM movimentacoes where data = curDate()");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$totalMovimentacoes = count($dados_total);



$res_todos = $pdo->query("SELECT * FROM contas_pagar where data = curDate() and pago = 'Não'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$vencimentosHoje = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM contas_receber where data = curDate() and pago = 'Não'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$recebimentosHoje = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM contas_pagar where data < curDate() and pago = 'Não'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$contasVencidas = count($dados_total);


$res_todos = $pdo->query("SELECT * FROM contas_receber where data < curDate() and pago = 'Não'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$recebimentosVencidos = count($dados_total);

?>



<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Movimentações Hoje</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalMovimentacoes ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-primary"></i>
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entradas do Dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $valorEntradas ?></div>
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
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Saídas do Dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $valorSaidas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card <%=classeValor2%> shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold <%=classeValor%> text-uppercase mb-1">Saldo do Dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $valorTotal ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x <%=classeValor%>"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="text-xs font-weight-bold text-secondary text-uppercase mt-4">Informações de Contas</div>
<hr> 

<div class="row">


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vencimentos Hoje</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vencimentosHoje ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-day fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recebimento Hoje</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $recebimentosHoje ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-day fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Contas Vencidas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $contasVencidas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Recebimentos Vencidos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $recebimentosVencidos ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>