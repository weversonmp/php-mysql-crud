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
					echo	"<tr><td rowspan='4'><img class='full' src='$t'>";
					echo	"<td><h2>$reg->nome</h2>";
					echo  "<tr><td>" . number_format($reg->nota, 1, ".") . " /10.0";
					echo	"<tr><td>$reg->descricao</td>";
					echo	"<tr><td>Adm";
				} else {
					var_dump($banco);
				}
			}
			?>

		</table>
		<a href="index.php"><img src="./icones/icoback.png" alt=""></a>
	</div>

	<?php $banco->close(); ?>
</body>

</html>