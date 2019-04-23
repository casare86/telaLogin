<?PHP
	include "validaLogado.php";
	$id		 = $_GET["id"];
	$sql = "UPDATE usuarios
			SET status = '2'
			WHERE idUsuario = $id";
	include  "conexaoLocal.php";	
	$contato = $digi -> prepare($sql);
	$contato -> execute();
	$digi = NULL;	

		
	header ("Location: logado.php");
?>