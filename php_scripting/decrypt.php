<?php
$key = file_get_contents('sharedsecret.pem');
$cipher = 'aes-256-ctr';
$iv_length = openssl_cipher_iv_length($cipher);
$request = base64_decode(rawurldecode($argv[1]));
$iv = substr($request, 0, $iv_length);
$encrypted_query = substr($request, $iv_length, NULL);
$query = openssl_decrypt($encrypted_query, $cipher, $key, $options=0, $iv);
echo $query;
?>
