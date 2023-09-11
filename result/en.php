<?php

$key = "encryption key";





$text="1920000731";
$encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));
print $encrypted."<br>" ;






?>