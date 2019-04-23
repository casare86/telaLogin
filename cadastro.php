<?PHP
	include "validaLogado.php";
	if(isset($_POST['salvar'])){
		$nome = $_POST["nome"];
		$login = $_POST["login"];
		$senhaSimples = $_POST["senha"];
		$senha = MD5($senhaSimples);
		$status = $_POST["status"];
		
		$sql = "INSERT INTO usuarios
		(idUsuario, nome, login, senha, status)
		VALUES
		('','$nome', '$login','$senha','$status')";
		
		include "conexaoLocal.php";
		$contato = $digi -> prepare($sql);
		$contato -> execute();
		$digi = NULL;
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta name="description" content="Tela de login para a primeira fase da Digidata, para vaga de programador PHP Jr.">
	<meta name="author" content="Fernando A. Malavazzi Casare">
	<title>Logado - Digidata</title>
	
	<link href="css/estiloDigidata.min.css" rel="stylesheet">
	
	<script type="text/javascript">
			function validarDados(){
				var nome 		  = document.getElementById("campoNome").value;
				var login		  = document.getElementById("login").value;
				var senha		  = document.getElementById("senha").value;
				var confirmaSenha = document.getElementById("confirmaSenha").value;
				if( nome == "" || nome.length < 3){
					alert('O nome não pode ter menos de 3 letras');
					document.cadastro.campoNome.focus();
					return false;
				}
				if(login.length < 5 || login.length > 10){
					alert("Login deve ter entre 5 e 10 dígitos");
					document.cadastro.login.focus();
					return false;
				}
				if(senha.length < 5 || senha.length > 10){
					alert("Senha deve ter entre 5 e 10 caracteres");
					document.cadastro.senha.focus();
					return false;
				}
				if(senha !== confirmaSenha){
					alert("Senha e a Confirmação da senha não conferem.");
					document.cadastro.confirmaSenha.focus();
					return false;
				}
				
				return true;
			}
		</script>
		
</head>

<body>
	<div id="wraper">
	<?PHP include "navbar.php"?>
		<div class="container">
			
			<h1> Cadastro de usuários </h1>
			<form action="#" method="POST" name="cadastro" onsubmit="return validarDados()">
			<table class="tabela">
				<tr>
					<td> Nome*: </td>
					<td> 
					<input type="text" name="nome" id="campoNome" required>
					</td>
				</tr>
				<tr>
					<td> Login*: </td>
					<td> <input type="text" name="login" id="login" required> </td>
				</tr>
				<tr>
					<td> Senha*: </td>
					<td> <input type="password" name="senha" id="senha" required> </td>
				</tr>
				<tr>
					<td> Confirmar Senha*: </td>
					<td> <input type="password" name="confirmaSenha" id="confirmaSenha" required> </td>
				</tr>
				<tr>
					<td> Status </td>
					<td> 
						<select name="status">
							<option value="1"> Ativo </option>
							<option value="2"> Inativo </option>
						</select>
					</td>
					<td>
						<input type="hidden" value="salvar" name="salvar">
						<button type="submit" class="button"  id="salvar"  name="Salvar" value="salvar"> Salvar </button>
						<button type="reset" class="button"> Limpar </button>
						<a href="logado.php"> <button type="button"   class="button" > Retornar </button></a>
					</td>
				</tr>
			</table>
			</form>
			<h3> Campos com * são de preenchimento obrigatório. </h3>
		
			<?PHP include "rodape.php"; ?>		
			</div>
	
			</div>
		
		
	
</body>
</html>
