<?PHP
	session_start();
	include "conexaoLocal.php";
	if ((isset($_POST['entrar'])) && ($_POST['entrar']) == 'Entrar'){
    	$usuario = $_POST['login'];
    	$senhaAcesso = $_POST['password'];
    	$senha = MD5($senhaAcesso);
		//sql para captura de informações no BD
		$sql = "SELECT nome, login, senha FROM usuarios WHERE login = '$usuario' AND status = '1'";		
		$login = $digi -> prepare($sql); 		
		$login -> execute(); 					
		echo $usuario. "<br>" .$senha;
		foreach ($login as $logado){
			$loginBanco = $logado['login'];
			$senhaBanco = $logado['senha'];
			$nome		= $logado['nome'];
		}
		if(($loginBanco == $usuario) && ($senhaBanco == $senha)){
			session_start();
			$_SESSION['nome'] = $nome;
			$_SESSION['logado'] = true;
			header("Location: logado.php");
		}
		else {
			$_SESSION['falha'] = true;
			header("Location: index.php");	
		}
		$digi = null;
	}
	else{
		$_SESSION['falhaEntrada'] = true;
		header("Location: index.php");
	}
	
	

?>