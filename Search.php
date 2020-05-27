<?php
session_start();
include_once("conexao.php");

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>RicardoTi</title>		
	</head>
	<body>
		<form action="Search.php" method="post">
			<input type="text" name="search" placeholder="Qual peça gostaria de ver no banco de dados?" />
			<input type="submit" value=">>" />
		</form>
		
		<a</a><br>
	<a href="cad_usuario.php">Cadastrar peças</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Resultados da Pesquisa</h1>
		<?php		
			$output= '';
			if(isset($_POST['search'])) {
				$searchq = $_POST['search'];
				$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
				$query = mysqli_query($conn, "SELECT * FROM tb_pecas WHERE Nome LIKE '%$searchq%'") or die ("Impossível de pesquisar");
				$count = mysqli_num_rows($query);
		
				if($count == 0){
					$output = 'Sem resultados de busca';
				}
				else{
			
					while($linha = mysqli_fetch_array($query)){
						echo "<br>" . "<br>" . "ID: " . $linha['id_peca'] . "<br>";
						echo "Nome: " . $linha['Nome'] . "<br>";
						echo "Fabricante: " . $linha['Fabricante'] . "<br>";
						echo "Descrição: " . $linha['Descricao'] . "<br>";
						echo "Quantidade: " . $linha['Quantidade'] . "<br>";
						echo "Localização: " . $linha['Localização'] . "<br>";
						echo "<a href='edit_usuario.php?id_peca=" . $linha['id_peca'] . "'>Editar</a><br>";
						echo "<a href='proc_apagar_usuario.php?id_peca=" . $linha['id_peca'] . "'>Apagar</a><br><hr>";
					}
				}	
			}	
		?>
	</body>
</html>
<h2><a href="voltar.php">Voltar</a></h2>