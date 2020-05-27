<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_STRING);
$fabricante = filter_input(INPUT_POST, 'Fabricante', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'Descricao', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'Quantidade', FILTER_SANITIZE_STRING);
$localização = filter_input(INPUT_POST, 'Localização', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_pecas = "INSERT INTO tb_pecas (Nome, Fabricante, Descricao, Quantidade, Localização) VALUES ('$nome', '$fabricante', '$descricao','$quantidade','$localização')";
$resultado_pecas = mysqli_query($conn, $result_pecas);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cad_usuario.php");
}
