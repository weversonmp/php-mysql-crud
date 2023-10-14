<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
        <?php require_once "topo.php"; ?>
        <h1 style="margin-bottom: 30px;">Escolha seu jogo</h1>

        <form action="index.php" method="get" id="busca">
            Ordenar:
            <a href="index.php?o=n&c=<?= $chave ?>">Nome</a> |
            <a href="index.php?o=p&c=<?= $chave ?>">Produtora</a> |
            <a href="index.php?o=n1&c=<?= $chave ?>">Nota Alta</a> |
            <a href="index.php?o=n2&c=<?= $chave ?>">Nota baixa</a> |
            <a href="index.php">Mostrar Todos</a> |
            Buscar: <input type="text" name="c" id="" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
            $q = 'select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j
    join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ';

            if (!empty($chave)) {
                $q .= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%' ";
            }

            switch ($ordem) {
                case 'p':
                    $q .= "ORDER BY p.produtora";
                    break;
                case 'n1':
                    $q .= "ORDER BY j.nota DESC";
                    break;
                case 'n2':
                    $q .= "ORDER BY j.nota ASC";
                    break;

                default:
                    $q .= "ORDER BY j.nome";
                    break;
            }
            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td><p>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td><p>Nenhum registro encontrado</p>";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo " ";
                        echo "<br>($reg->genero) $reg->produtora";

                        if (is_admin()) {
                            echo "<td>
                            <a href=''><span class='material-symbols-outlined'>add_circle</span></a> 
                            <a href='detalhes-edit.php?cod=" . $reg->cod . "'><span class='material-symbols-outlined'>edit</span></a> 
                            <a href='user-login.php'><span class='material-symbols-outlined'>delete</span></a>";
                        } elseif (is_editor()) {
                            echo "<td>";
                            echo "<a href='user-login.php'><span class='material-symbols-outlined'>edit</span></a> <a href='user-login.php'>";
                        }
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php $banco->close(); ?>
</body>

</html>