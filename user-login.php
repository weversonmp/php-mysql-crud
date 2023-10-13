<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="./estilos/style.css">

    <title>Login de Usuário</title>
    <style>
        div#corpo {
            width: 370px;
            font-size: 15pt;
        }

        table {
            padding: 6px;
        }

        div.erro {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="corpo">
        <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;

        if (is_null($u) || is_null($s)) {
            require "user-login-form.php";
        } else {
            $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
            $busca = $banco->query($q);
            if (!$busca) {
                echo msg_erro('Falha ao acessar o banco!');
            } else {
                if ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($s, $reg->senha) && $u == $reg->usuario) {
                        echo msg_sucesso('Logado com Sucesso!');
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                    } else {

                        echo msg_erro('Senha inválida');
                    }
                } else {
                    include_once "user-login-form.php";
                    echo msg_erro('Usuário não existe');
                }
            }
        }
        ?>
        <?= voltar() ?>

    </div>
</body>

</html>