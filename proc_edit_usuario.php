<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id_peca', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_STRING);
$fabricante = filter_input(INPUT_POST, 'Fabricante', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'Descricao', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'Quantidade', FILTER_SANITIZE_STRING);
$localização = filter_input(INPUT_POST, 'Localização', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_pecas = "UPDATE tb_pecas SET Nome='$nome', Fabricante='$fabricante', Descricao='$descricao', Quantidade='$quantidade', Localização='$localização' WHERE id_peca='$id' ";
$resultado_pecas = mysqli_query($conn, $result_pecas);


if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Peça editada com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Peça não foi editada com sucesso</p>";
	header("Location: editar.php?id_peca=$id");
}
