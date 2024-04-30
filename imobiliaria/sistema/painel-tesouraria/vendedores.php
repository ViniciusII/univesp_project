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
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Corretor</th>
                    </tr>
                </thead>

                <tbody>

                      <?php 

                  $query = $pdo->query("SELECT * FROM vendedores order by nome asc ");

                  $res = $query->fetchAll(PDO::FETCH_ASSOC);

                  for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      
                      
                      $id = $res[$i]['id'];
                      $nome = $res[$i]['nome'];
                      $cpf = $res[$i]['doc'];
                      $telefone = $res[$i]['telefone'];
                      $tipo = $res[$i]['tipo_pessoa'];
                      $endereco = $res[$i]['endereco'];
                      $corretor = $res[$i]['corretor'];

                     

                       $res_2 = $pdo->query("SELECT * FROM corretores where cpf = '" . $corretor . "' ");
                    $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
                     @$nomeCorretor = $dados_2[0]['nome'];
                                        

                      ?>

                  
                    <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $tipo ?></td>
                        <td><?php echo $cpf ?></td>
                        <td><?php echo $telefone ?></td>

                        <td><?php echo $endereco ?></td>

                        <td><?php echo $nomeCorretor ?></td>
                    </tr>

                   <?php } ?>





                </tbody>
            </table>
        </div>
    </div>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../../js/mascara.js"></script>