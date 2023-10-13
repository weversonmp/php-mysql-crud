<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="./estilos/style.css">
    <title>Listagem de Jogos</title>
</head>

<body>

    <div id="corpo">
        <?php
        if (!is_admin()) {
            echo msg_erro('Você não é administrador');
        } else {
            if (!isset($_POST['usuario'])) {
                require "user-new-form.php";
                
            } else {
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;
                $tipo = $_POST['tipo'] ?? null;

                if ($senha1 === $senha2) {
                    if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)) {
                        echo msg_erro('Todos os dados são obrigatórios');
                    } elseif ($usuario == $reg->usuario) {
                        $senha = gerarHash($senha1);
                        $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                        if ($banco->query($q)) {
                            echo msg_sucesso("Usuário $nome, cadastrado com sucesso!");
                        } else {
                           echo msg_erro("Não foi possivel criar o usuário $nome. Talvez o login já esteja sendo usado.");
                        }
                    }
                } else {
                    echo msg_erro('Senhas não conferem. Repita o procedimento.');
                }
            }
        }
        ?>
        <?=voltar()?>
    </div>

</body>

</html>