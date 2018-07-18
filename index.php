<?php 
/*    $conexao = oci_connect("system","123","localhost/xe");
    if (!$conexao):
        echo 'Falha ao Conectar no Oracle';
    else:
        echo 'Conectado com sucesso no Oracle DB';
 	endif;
//oci_close($conn);


 	$select = "SELECT * FROM USUARIOS";
 	
 	//resultado da query
 	$stid = oci_parse($conexao, $select);
 	

 	//executando a query
 	$exec = oci_execute($stid);


 	var_dump($exec);*/




 	//Conexão usando pdo oci oracle
 	$user = "system";
	$pass = "123";
	$name = "xe";
	$host = "localhost";
 	
 	$tns = " (DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.")(PORT = 1521)))(CONNECT_DATA = (SID = ".$name.")))";
	$pdo = new PDO("oci:dbname=".$tns,$user,$pass);

	if(!$pdo):
		die('Erro ao criar a conexão'); 
	else:
		echo "conectado -> ".date("H:i:s");
		echo"<br>";
	endif;


	$query = $pdo->query("SELECT * FROM USUARIOS");
	
	if($query->execute()):
		while($row = $query->fetch()):
		//$total = count($row);
			echo $row["IDUSUARIO"]." - ".$row["NOME"]."<br>";
		endwhile;
	
	endif;
	//

	//
?>