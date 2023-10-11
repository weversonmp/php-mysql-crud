<?php 

function gerarHash($senha) {
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function cripto($senha) {
    $c = '';
    for ($pos=0; $pos < strlen($senha); $pos++) { 
        $letra = ord($senha[$pos]) + 1;
        $c .= chr($letra);
    }

    return $c;
}

cripto('1234');