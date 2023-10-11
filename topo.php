<?php

if (empty($_SESSION['user'])) {
  echo "<a href='user-login.php' class='pequeno'>Entrar</a>";
    
} else {
  echo "Olá, " . $_SESSION['nome'];
}
// echo "<p class='pequeno'>";
// echo "</p>";
?>