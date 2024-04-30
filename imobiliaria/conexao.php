<?php 

//verificar versão do php (foi criado na 7.4.8, pode usar qualquer versão a partir da 7)
//phpinfo();

include_once("config.php");



date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$host;charset=utf8", "$usuario", "$senha");

} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! ".$e;
}

?>