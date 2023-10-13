<!DOCTYPE html>
<html lang="pt-Br">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="./estilos/style.css">
<title>Listagem de Jogos</title>
</head>

<body>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";

$ordem = $_GET['o'] ?? 'nome';
$chave = $_GET['c'] ?? '';

?>
<div id="corpo">

	</div>
</body>

</html>