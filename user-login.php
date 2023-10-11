<!DOCTYPE html>
<?php
  require_once "includes/banco.php";
  require_once "includes/funcoes.php";
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilos/style.css">
  <title>Login de Usuário</title>
  <style>
    div#corpo {
      width: 270px;
      font-size: 15pt;
    }

    table {
      padding: 6px;
    }
  </style>
</head>

<body>
  <div id="corpo">
    <?php 
    $u = $POST['usuario'] ?? '';
    $s = $POST['senha'] ?? '';

    if (empty($u) || empty($s)) {
      
      echo var_dump($u);
      require "user-login-form.php";
    } else {
      echo "Dados foram passados...";
    }
    ?>

  </div>
</body>

</html>