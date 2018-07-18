<?php
	@$IDUSUARIO = intval($_GET["ID"]);

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

	if(@$_GET["acao"] == "deletar"):
		$del = $pdo->query("DELETE FROM USUARIOS WHERE IDUSUARIO = {$IDUSUARIO}");	
		if($del->execute()):
			echo "Deletado com sucesso <a href='index.php'>Voltar</a>";
			exit();
		endif;
	endif;
?>

<a href="deletar.php?acao=deletar&ID=<?= $IDUSUARIO; ?>">Sim</a> | <a href="javascript:history.back();">Não</a>