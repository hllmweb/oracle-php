<?php

	//Conexão usando pdo oci oracle
 	$user = "system";
	$pass = "123";
	$name = "xe";
	$host = "localhost";
 	
 	$tns = "(DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.")(PORT = 1521)))(CONNECT_DATA = (SID = ".$name.")))";
	$pdo = new PDO("oci:dbname=".$tns,$user,$pass);

	if(!$pdo):
		die('Erro ao criar a conexão'); 
	else:
		echo "conectado -> ".date("H:i:s");
		echo"<br>";
	endif;


	if(@$_GET["acao"] == "adicionar"):
		$NOME 	= $_POST["NOME"];
		//$insert = $pdo->query("CREATE sequence SEQ_IDUSUARIO MINVALUE 1 START WITH 1 INCREMENT BY 1");
		$insert = $pdo->query("INSERT INTO USUARIOS values (SEQ_IDUSUARIO.NEXTVAL,'$NOME')");
		
		if($insert->execute()):
			echo "Adicionado com sucesso <a href='index.php'>Voltar</a>";
		endif;
	endif;
?>

<form action="adicionar.php?acao=adicionar" method="post">
	<label for="NOME">
		<strong>Nome</strong>
		<input type="text" name="NOME" placeholder="Nome">
	</label>
	<button type="submit">Adicionar</button>
</form>