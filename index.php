<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta name="description" content="Tela de login para a primeira fase da Digidata, para vaga de programador PHP Jr.">
	<meta name="author" content="Fernando A. Malavazzi Casare">
	<title>Login - Digidata</title>
	
	<link href="css/estiloDigidata.css" rel="stylesheet">
</head>

<body>
	<div id="wraper">
		<form action="validaAcesso.php" method="POST">
			<div id="telaLogin">
			<table align="center">
			<tr>
				<td align="right">Usuário:</td>
				<td><input type="text" id="login" name="login" placeholder="Digite seu login"> </td>
			</tr>
			<tr>
				<td align="right">Senha: </td>
				<td><input type="password" id="senha" name="password" placeholder="Digite sua senha"> </td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button type="submit" class="button"  name="entrar" value="Entrar"> Entrar </button>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <a href=""> Esqueci a senha  </a>
			</tr>
			</table>
		</form>
		</div>
	<div class='rodapeIndex'>
		<footer>
		<p> Programador responsável:  Fernando A. Malavazzi Casare </p>
		<p> Contato: (41) 99927-2236 </p>
		<p id='copyright'> Copyright &copy; 2019 - Fernando Casare. </p>
	</div>
	</div>
	
</body>
</html>
<?PHP
	
	session_start();
	if(isset($_SESSION['falha'])){
		echo "<script> alert('Usuário ou Senha incorretos');</script>";
	}
	else if(isset($_SESSION['falhaEntrada'])){
		echo "<script> alert('Você não tem permissão para acessar a página. Por favor, logue-se no sistema.');</script>";
	}
	session_destroy();
?>