<?php
	$IDUSUARIO = intval($_GET["ID"]);


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


	$query = $pdo->query("SELECT * FROM USUARIOS WHERE IDUSUARIO = {$IDUSUARIO}");
	$query->execute();
	$row = $query->fetch();
	
	if($_POST && @$_GET["acao"] == "editar"):
		$NOME = $_POST["NOME"];
		$edit = $pdo->query("UPDATE USUARIOS SET NOME='$NOME' WHERE IDUSUARIO = {$IDUSUARIO}");
		if($edit->execute()):
			echo "Alterado com sucesso";
		endif;
	endif;

?>


<form action="editar.php?acao=editar&ID=<?= $IDUSUARIO; ?>" method="post">
	<label for="NOME">
		<strong>Nome</strong>
		<input type="text" name="NOME" value="<?= $row["NOME"]; ?>" placeholder="Nome">
	</label>
	<button type="submit">Atualizar</button>

</form>