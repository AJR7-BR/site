<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id_peca', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_pecas = "DELETE FROM tb_pecas WHERE id_peca='$id'";
	$resultado_pecas = mysqli_query($conn, $result_pecas);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Peça apagada com sucesso</p>";
		header("Location: index.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro a peça não foi apagada com sucesso</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma peça</p>";
	header("Location: index.php");
}
