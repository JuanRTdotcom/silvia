<?php
if (!defined('BASEPATH')){exit('No direct script access allowed');}

if (!function_exists('encriptar'))
{
    function encriptar($texto){
        $key='f8286fed52ecae5ac1619e60214e368893e01454';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar o dejar en blanco
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $texto, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }
}

if (!function_exists('desencriptar'))
{
    function desencriptar($texto){
        $key='f8286fed52ecae5ac1619e60214e368893e01454';  // Una clave de codificación, debe usarse la misma para encriptar y desencriptar o dejar en blanco
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($texto), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;
    }  
}