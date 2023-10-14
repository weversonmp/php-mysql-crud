<form action="detalhes-edit.php" method="post">
    <table class='detalhes'>
        <?php

        if (!$busca) {
            echo "Busca Falhou";
        } else {
            if ($busca->num_rows == 1) {
                $reg = $busca->fetch_object();
                $t = thumb($reg->capa);
                echo    "<tr><td rowspan='3'><img class='full' src='$t'>";
                echo    "<tr><td><strong>Título: </strong><input type='text' name='titulo' id='titulo' value='$reg->nome'></input>";
                echo  "<br><strong>Nota: </strong><input type='text' name='titulo' id='titulo' value='" . number_format($reg->nota, 1, ".") . "'></input>";
                echo    "<tr><td><strong>Descrição: </strong><br><br><textarea name='descricao' id='descricao' cols='60' rows='20'>$reg->descricao</textarea></td>";
            }
        }
        ?>
        <tr>
        <td><input type="submit" value="Atualizar"><br>
    </table>
</form>