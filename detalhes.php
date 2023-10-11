<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./estilos/style.css">
	<title>Detalhes do Jogo</title>
</head>

<body>
	<?php
	require_once "includes/banco.php";
	require_once "includes/funcoes.php";
	?>

	<div id="corpo">

		<?php
		$c = $_GET['cod'] ?? 0;
		$busca = $banco->query("select * from jogos where cod='$c'");
		?>

		<h1>Detalhes do Jogo</h1>
		<table class='detalhes'>
			<?php
			if (!$busca) {
				echo "Busca Falhou";
			} else {
				if ($busca->num_rows == 1) {
					$reg = $busca->fetch_object();
					$t = thumb($reg->capa);
					echo	"<tr>";
					echo	"<td rowspan='3'><img src='$t'>";
					echo	"<td>$reg->nome";
					echo	"<tr>";
					echo	"<td>$reg->descricao</td>";
					echo	"<tr>";
					echo	"<td>Adm</td>";
				} else {
					var_dump($banco);
				}
			}
			?>

		</table>
	</div>

	<?php $banco->close(); ?>
</body>

</html>