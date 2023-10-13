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

        if (!isset($_SESSION['user'])) {
            if ($u == null || $s == null) {
                include_once "user-login-form.php";
            } else {
                $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                $busca = $banco->query($q);
                if (!$busca) {
                    echo msg_erro('Falha ao acessar o banco!');
                } elseif ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($s, $reg->senha) && $u == $reg->usuario) {
                        echo msg_sucesso('Logado com Sucesso!');
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                    } else {
                        include_once "user-login-form.php";
                        echo msg_aviso("Usuario ou Senha Inválidos!");
                    }
                } else {
                    include_once "user-login-form.php";
                    echo msg_aviso("Usuario ou Senha Inválidos!");
                }
            }
        } else {
            echo msg_sucesso('O usuário: ' . $_SESSION['nome'] . ', Já está logado');
        }
        ?>
        <?= voltar() ?>

    </div>
</body>

</html>