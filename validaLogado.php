<?PHP
	session_start();
	if(isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
		include "conexaoLocal.php";								//conexão com o BD
		
		

	}
	else{
		$_SESSION['falhaEntrada'] = true;
		header("Location: index.php");
	}
	?>