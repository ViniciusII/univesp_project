<?php 
include_once("../../../conexao.php");


$bairro = @$_POST['txtbairro']; 
$cidade = @$_POST['txtcidade']; 
$id = @$_POST['txtid3']; 
    
echo $id;

echo "<div class='form-group'><label >Bairro</label><select class='form-control' name='bairro' id='bairro'>";

                                    
                                         if ($id != "") {
                                $query = $pdo->query("SELECT * FROM bairros where id = '" . $bairro . "'  ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                
                                $nome4 = $res[0]['nome'];

                                echo "<option value='" . $bairro . "'>" . $nome4 . "</option>";
                            }

                            $query2 = $pdo->query("SELECT * FROM bairros where cidade = '" . $cidade . "' order by nome asc");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < count($res2); $i++) { 
                              foreach ($res2[$i] as $key => $value) {
                              }
                              if(@$nome4 != $res2[$i]['nome']){
                                echo "<option value='" . $res2[$i]['id'] . "'>" . $res2[$i]['nome'] . "</option>";
                            }
                        }

                         echo"</select> </div>";

                         ?>

                                            


