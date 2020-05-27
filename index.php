<?php
session_start();
include_once("conexao.php");

?>
<!DOCTYPE html>
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
		<h1>Listar Peças</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 2;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_pecas = "SELECT * FROM tb_pecas LIMIT $inicio, $qnt_result_pg";
		$resultado_pecas = mysqli_query($conn, $result_pecas);
		while($linha_peca = mysqli_fetch_assoc($resultado_pecas)){
			echo "ID: " . $linha_peca['id_peca'] . "<br>";
			echo "Nome: " . $linha_peca['Nome'] . "<br>";
			echo "Fabricante: " . $linha_peca['Fabricante'] . "<br>";
			echo "Descrição: " . $linha_peca['Descricao'] . "<br>";
			echo "Quantidade: " . $linha_peca['Quantidade'] . "<br>";
			echo "Localização: " . $linha_peca['Localização'] . "<br>";
			echo "<a href='edit_usuario.php?id_peca=" . $linha_peca['id_peca'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_usuario.php?id_peca=" . $linha_peca['id_peca'] . "'>Apagar</a><br><hr>";
		}
		
		//Paginção - Somar a quantidade de Pecas
		$result_pg = "SELECT COUNT(id_peca) AS num_result FROM tb_pecas";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>