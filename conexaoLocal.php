<?PHP 
	//faz a conexão do códico com o banco
	try{
		$digi = new PDO("mysql:host=localhost;dbname=digidata", "root", ""); //conexão com o banco de dados
	    // mensagem de teste para verificar a conexão 
		//echo "conectado";
	}
	catch (PDOException $e) {
		echo $e->getMessage(); //aviso caso não de certo a conexão
		echo "Conexão inválida";
		}
	  
?>