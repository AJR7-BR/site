<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "bd_pecas";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
echo "Conexão Efetuada";

