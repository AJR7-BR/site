<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id_peca', FILTER_SANITIZE_NUMBER_INT);
$result_pecas = "SELECT * FROM tb_pecas WHERE id_peca = '$id'";
$resultado_pecas = mysqli_query($conn, $result_pecas);
$Linha_peca = mysqli_fetch_assoc($resultado_pecas);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>RicardoTi</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar peças</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Editar Peças</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id_peca" value="<?php echo $Linha_peca['id_peca']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="Nome" placeholder="Digite o nome completo" value="<?php echo $Linha_peca['Nome']; ?>"><br><br>
			
			<label>Fabricante: </label>
			<input type="text" name="Fabricante" placeholder="Digite o Fabricante" value="<?php echo $Linha_peca['Fabricante']; ?>"><br><br>
			
			<label>Descrição: </label>
			<input type="text" name="Descricao" placeholder="Digite a Descrição da peça" value="<?php echo $Linha_peca['Descricao']; ?>"><br><br>
			
			<label>Quantidade: </label>
			<input type="number" name="Quantidade" placeholder="Digite a quantidade da peça" value="<?php echo $Linha_peca['Quantidade']; ?>"><br><br>
			
			<label>Localização: </label>
			<input type="text" name="Localização" placeholder="Digite a Localização" value="<?php echo $Linha_peca['Localização']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>