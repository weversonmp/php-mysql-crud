<?php

function thumb($arq)
{
    $caminho = "fotos/$arq";
    if (is_null($arq) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function seUsuarioExiste($banco, $user) {
    $q = "SELECT usuario FROM usuarios WHERE usuario='$user'";
    $res = $banco->query($q);
    $res = $res->fetch_object();
    if ($res->usuario == $user) {
        return true;
    } else {
        return false;
    }
}

function voltar($local = 'index.php')
{
    return "<a href='$local'><span class='material-symbols-outlined'>arrow_back</span></a>";
}

function msg_sucesso($m)
{
    $resp = "<div class='sucesso'><span class='material-symbols-outlined'>check_circle</span> $m</div>";

    return $resp;
}

function msg_aviso($m)
{
    $resp = "<div class='aviso'><span class='material-symbols-outlined'>info</span> $m</div>";

    return $resp;
}

function msg_erro($m)
{
    $resp = "<div class='erro'><span class='material-symbols-outlined'>error</span> $m</div>";

    return $resp;
}