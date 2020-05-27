<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>RicarTi</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar peças</a><br>
		<a href="index.php">Listar peças</a><br>
		<h1>Cadastrar Peça</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_usuario.php">
			<label>Nome: </label>
			<input type="text" name="Nome" placeholder="Digite o nome completo"><br><br>
			
			<label>Fabricante: </label>
			<input type="text" name="Fabricante" placeholder="Digite o Fabricante"><br><br>
			
			<label>Descrição: </label>
			<input type="text" name="Descricao" placeholder="Digite a Descrição da peça"><br><br>
			
			<label>Quantidade: </label>
			<input type="number" name="Quantidade" placeholder="Digite a quantidade da peça"><br><br>
			
			<label>Localização: </label>
			<input type="text" name="Localização" placeholder="Digite a Localização"><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>