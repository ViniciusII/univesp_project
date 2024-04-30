<?php 

include_once("../conexao.php");

$email_usuario = $_POST['email-recuperar'];

	$res = $pdo->prepare("SELECT * from usuarios where email = :usuario");

	$res->bindValue(":usuario", $email_usuario);
	$res->execute();

	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);

	if($linhas > 0){
		$nome_usu = $dados[0]['nome'];
		$senha_usu = $dados[0]['senha'];
		$nivel_usu = $dados[0]['nivel'];

	}else{
		echo 'Este email não está cadastrado no site!';
		exit();
	}

	
	
	//AQUI VAI O CÓDIGO DE ENVIO DO EMAIL
	$to = $email_usuario;
	$subject = 'Recuperação de Senha IMOB';

	$message = "

	Olá $nome_usu!! 
	<br><br> Sua senha é <b>$senha_usu </b>

	
	";

	$remetente = $email;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8;' . "\r\n";
	$headers .= "From: " .$remetente;
	mail($to, $subject, $message, $headers);

	

	echo 'Senha Enviada para o Email!';

	


 ?>