<?php 
    $q = "select usuario, nome, senha, tipo from usuarios where usuario='" . $_SESSION['user'] . "'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>


<h1>Alteração dos Dados</h1>
<form action="user-edit.php" method="post">
    <table>
        <tr>
            <td>Usuário:
            <td><input type="text" name="usuario" id="usuario" size="10" maxlength="10" required value="<?=$reg->usuario ?>" readonly>
        </tr>

        <tr>
            <td>Nome:
            <td><input type="text" name="nome" id="nome" size="30" maxlength="30" required value="<?=$reg->nome ?>">
        </tr>

        <tr>
            <td>Tipo:
            <td><input type="text" name="tipo" id="tipo" size="10" maxlength="10" readonly value="<?=$reg->tipo ?>">
        </tr>

        <tr>
            <td>Senha1:
            <td><input type="password" name="senha1" id="senha1" size="8" maxlength="8">
        </tr>

        <tr>
            <td>Senha2:
            <td><input type="password" name="senha2" id="senha2" size="8" maxlength="8">
        </tr>

        <tr>
            <td><input type="submit" value="Salvar">
        </tr>
    </table>
</form>