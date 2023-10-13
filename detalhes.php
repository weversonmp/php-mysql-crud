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
</head>

<body>

	<div id="corpo">
		

		<?php
		require_once "topo.php";
		$c = $_GET['cod'] ?? 0;
		$busca = $banco->query("select * from jogos where cod='$c'");
		?>

		<table class='detalhes'>
			<?php

			if (!$busca) {
				echo "Busca Falhou";
			} else {
				if ($busca->num_rows == 1) {
					$reg = $busca->fetch_object();
					$t = thumb($reg->capa);
					echo	"<tr><td rowspan='4'><img class='full' src='$t'>";
					echo	"<td><h1>$reg->nome</h1>";
					echo  "<tr><td>" . number_format($reg->nota, 1, ".") . " /10.0";

					if (is_admin()) {
						echo " <a href='user-login.php'><span class='material-symbols-outlined'>add_circle</span></a> <a href='user-login.php'><span class='material-symbols-outlined'>edit</span></a> <a href='user-login.php'><span class='material-symbols-outlined'>delete</span></a>";
				} elseif (is_editor()) {
						echo " <a href='user-login.php'><span class='material-symbols-outlined'>edit</span></a> <a href='user-login.php'>";
				}
					echo	"<tr><td>$reg->descricao</td>";
				} else {
					echo "Nenhum registro encontrado...";
				}
			}
			?>
		</table>
		<?= voltar() ?>
		
	</div>
	<?php $banco->close(); ?>

	
</body>

</html>