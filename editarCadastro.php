<!DOCTYPE html> 
<?php
	include "validaLogado.php";
	
	if(ISSET($_POST['salvar']) && ($_POST['salvar'] == "Salvar")){
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$login = $_POST['login'];
		$senhaSimples = $_POST['senha'];
		$senha = MD5($senhaSimples);
		$status = $_POST['status'];
		$sql2 = "UPDATE usuarios
				SET
				nome = '$nome',
				login = '$login',
				senha = '$senha',
				status = '$status'
				WHERE
				idUsuario = '$id'";		
		$contato = $digi -> prepare($sql2);
		$contato -> execute();
		$digi = NULL;
		header("Location:logado.php");
			
	}else{
		$id = $_GET['id'];													//incluir no codigo php
		$sql = "SELECT * FROM usuarios WHERE idUsuario = $id";
		include "conexaoLocal.php";									// variavel que recebe a string
		$contatos = $digi -> prepare($sql);					//faz conexao e prepara 
		$contatos -> execute();						    	    //executa o comando
	
	foreach($contatos as $digi){}
	
	}

	?>
	
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Fernando A. Malavazzi Casare">
		<link href="css/estiloDigidata.min.css" rel="stylesheet">
		<title>Usuários</title>
		
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
			
			<h1> Edição de usuários </h1>
			<hr>
			<div class="tabela half">
			<form action="#" method="POST" name="cadastro" onSubmit="return validarDados()">
			<table class="">
				<tr>
					<input type="hidden"  name="id" value="<?php echo $digi['idUsuario']?>">
					<td> Nome*: </td>
					<td> 
					<input type="text" name="nome" id="campoNome" value="<?php echo $digi['nome']?>">
					</td>
				</tr>
				<tr>
					<td> Login*: </td>
					<td> <input type="text" name="login" id="login"  value="<?php echo $digi['login']?>" required> </td>
				</tr>
				<tr>
					<td> Nova senha*: </td>
					<td> <input type="password" name="senha" id="senha" required> </td>
				</tr>
				<tr>
					<td> Confirmar senha*: </td>
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
				</tr>
				<tr>
					<input type="hidden" name="salvar" value="Salvar">
					<td colspan="2" align="center">
						<button type="submit" class="button"> Salvar </button>
						<button type="reset" class="button"> Limpar </button>
						<a href="logado.php"> <button type="button"   class="button" > Retornar </button></a>
					</td>
				</tr>
				</table>
				
			</form>
		</div>
			<?PHP include "rodape.php"; ?>
		</div>
	</body>
</html>