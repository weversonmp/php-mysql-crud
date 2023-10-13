<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="./estilos/style.css">
    <title>Edição de Dados do Usuário</title>

    <?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";

    ?>
</head>

<body>
    <div id="corpo">
        <?php
        if (!is_logado()) {
            echo msg_erro("Efetue <a href='user-login.php'>login</a> para poder editar");
        } else {
            if (!isset($_POST['usuario'])) {
                include "user-edit-form.php";
            } else {
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $tipo = $_POST['tipo'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;

                $q = "update usuarios set usuario = '$usuario', nome='$nome'";

                if (empty($senha1) || empty($senha2)) {
                    echo msg_aviso("Senha antiga foi mantida");
                } elseif ($senha1 == $senha2) {
                    $senha = gerarHash($senha1);
                    $q .= ", senha='$senha'";
                } else {
                    echo msg_erro('Senhas não conferem. A senha anterior será mantida.');
                }

                $q .= " where usuario='" . $_SESSION['user'] . "'";
                
                if ($banco->query($q)) {
                    echo msg_sucesso('Dados do usuário atualizados com sucesso!');
                    logout();
                    echo msg_aviso("Efetue o <a href='user-login.php'>login</a> novamente");
                } else {
                    msg_erro('Não foi possível alterar os dados');
                }
            }
        }
        echo '<br>' . voltar();
        ?>
    </div>
</body>

</html>