<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="./estilos/style.css">
  <title>Listagem de Jogos</title>
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
  <?php
  require_once "includes/banco.php";
  require_once "includes/login.php";
  require_once "includes/funcoes.php";

  ?>
  <div id="corpo">
    <?php
    if (!isset($_SESSION['user'])) {
      echo msg_erro('Nenhum usuário esta logado!');
    } else {
      logout();
      echo msg_sucesso('Usuário deslogado com sucesso');
    }
    ?>
    <?= voltar() ?>

  </div>
</body>

</html>