<?php
$key = file_get_contents('sharedsecret.pem');
$cipher = 'aes-256-ctr';
$iv_length = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($iv_length);
$encrypted_contents = openssl_encrypt($argv[1], $cipher, $key, $options=0, $iv);
$response = rawurlencode(base64_encode($iv.$encrypted_contents));
echo $response;
?>
