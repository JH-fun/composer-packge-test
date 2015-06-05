<?php

function strcode($string, $auth_key, $action = 'ENCODE')
{
    $key    = substr(md5($_SERVER["HTTP_USER_AGENT"] . $auth_key), 8, 18);
    $string = $action == 'ENCODE' ? $string : base64_decode($string);
    $len    = strlen($key);
    $code   = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $k = $i % $len;
        $code .= $string[$i] ^ $key[$k];
        echo $code . '<br/>';
    }
    echo '          ttt' . $code . '<br/>';
    $code = $action == 'DECODE' ? $code : base64_encode($code);
    echo '          sss' . $code . '<br/>';
    return $code;
}

echo md5("sxxrrrsjj你们い好イ");
////UwEFAwtTDwg=
//echo strcode("27408079", "qq")."<br/>";
////Cw4DUloBUwk=
//echo strcode("Cw4DUloBUwk", "q",'DECODE')."<br/>";
//
//echo strcode("j82aibk8", "q")."<br/>";

