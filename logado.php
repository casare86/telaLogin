<?PHP
	include "validaLogado.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta name="description" content="Tela de login para a primeira fase da Digidata, para vaga de programador PHP Jr.">
	<meta name="author" content="Fernando A. Malavazzi Casare">
	<link href="css/estiloDigidata.min.css" rel="stylesheet">
	<title>Logado - Digidata</title>
	
	<script>
		function excluir(){
			decisao = confirm("Deseja mesmo excluir esse contato?");
			if (decisao){
				//window.location.href = "excluirCadastro.php?id=$id&nome=$nome";
				return true;
			} else {
				alert ("Ok. O dado não será excluido.");
				return false;
			}
		}
	</script>
	 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
</head>

<body>
	<div id="wraper">
		<?PHP include "navbar.php"?>
		<div class="container">
			
			<h1> Listagem de usuários </h1>
			<div class="tabela">
			<form action="#" method="POST">
			<table>
			<tr>
				<td align="left">Nome:</td>
				<td><input type="text" name="buscar"id="buscar" placeholder="Busca por nome"> </td>
			</tr>
			<tr>
				<td align="left">Status: </td>
				<td>
					<select name="status">
						<option value=""> Todos </option>
						<option value="1"> Ativo </option>
						<option value="2"> Inativo </option>
					</select>
				</td>
				<td align="">
					<button type="submit" class="button"> Buscar </button>
					<button type="reset" class="button"> Limpar </button>
					<a href="cadastro.php"> <button type="button"   class="button"  name="novo" > Novo registro</button></a>
				
				</td>
			</tr>
			</table>
			</form>
			</div>
			
			<div class="resultados">
			<hr>
			<table class="tabela">
			<thead>
				<tr>
					<td> Nome </td>
					<td> Login </td>
					<td> Status </td>
					<td align="center"> Ações </td>
				</tr>
			</thead>
			<tbody>
			<?PHP
				$sql = "SELECT * FROM usuarios;";
				IF(ISSET($_POST['buscar']) && ($_POST['status'] != null)){ //captura os valores para busca e se o status é ativo ou inativo
					$pesquisa = $_POST['buscar'];
					$status = $_POST['status'];
					
					$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%' AND status = $status";
				}else if(ISSET($_POST['buscar']) && ($_POST['status'] == null)){
					$pesquisa = $_POST['buscar'];
					$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%'";
				}
							
				$contatos = $digi -> prepare($sql);			
				$contatos -> execute();						
				foreach($contatos as $usuario){
				
					$id  			 = $usuario["idUsuario"];
					$nome			 = $usuario['nome'];
					$login			 = $usuario['login'];
					$getStatus       = $usuario['status'];
					if ($getStatus == 1){
						$status = "Ativo";
					}else {
						$status = "Inativo";
					}
					
					
					//Montando a tabela com os valores recebidos
					echo "<tr>";
					echo "<td>".$nome."</td>";
					echo "<td>".$login."</td>";
					echo "<td>".$status."</td>";
					echo "<td align='center'>
						<a href='editarCadastro.php?id=$id&nome=$nome'><button><img class='icon' src='img/edit.png'> Editar </button></a>
						&nbsp;&nbsp;
						<a href='excluirCadastro.php?id=$id'> <button onclick='return excluir()'><img class='icon' src='img/lixo.png'> Excluir </button></a>
						</td>";
					echo "</tr>";	
				}
				
			?>			
			</tbody>
			</table>
			
				<?PHP include "rodape.php"; ?>
			
			</div>
		
		</div>
 
</body>
</html>
