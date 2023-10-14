<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./estilos/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
	<title>Detalhes do Jogo</title>
	<!-- <style>
		td {
			border: 1px solid black;
		}
	</style> -->
</head>

<body>

	<div id="corpo">
		<?php
		require_once "topo.php";
		$c = $_GET['cod'] ?? 0;
		$busca = $banco->query("select * from jogos where cod='$c'");

		if (isset($_POST['titulo'])) {
			echo msg_sucesso('Atualizado com sucesso');
		} else {
			include "detalhes-edit-form.php";
			
		}
		
		?>
		<?= voltar() ?>
	</div>
	<?php $banco->close(); ?>


</body>

</html>