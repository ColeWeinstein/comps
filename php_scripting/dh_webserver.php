<?php
// p and g held constant between DH negotiations.
$configargs = array();
$configargs['p'] = hex2bin('00dbfcb09a5c3b41b83bb11a384530d1af7781fc675aba5a397e72eb6a983e269148533baa63e2980bdff33d6d2702d30ebc33bd8913edf7a3622f152bf00231e631d16301dd376c07e4a9173c581dff78bbd3e6a5ecd70e284031e74bf63d6be718adb1a1d469e99678fbbb2742a427d1df0883fc2cdb3a741baa5ab9ea58910b3cf47cc29ee433e4d28d2f3b6fff2cfe13ef2b3fbd684509f519e22ad17b6d042ef47fbeebce8cb8671786c02b74c1c26306aed65d76c49c28539c2285d4420ea179832aa34555402645f3886020f5a80eb71b44bde688057213211601ee950d19083e56f1047b2159b668c2903d65f5ce02eb91902958141d0451cf2421cb87');
$configargs['g'] = hex2bin('02');
$private_key = openssl_pkey_new(array('dh' => $configargs));
openssl_pkey_export_to_file($private_key, 'privatekey.pem');

$details = openssl_pkey_get_details($private_key);
$local_pub_key = $details['dh']['pub_key'];
echo bin2hex($local_pub_key); 

// Public key from webserver inputted as sole command-line argument
$remote_pub_key = hex2bin($argv[1]);
$shared_secret = openssl_dh_compute_key($remote_pub_key, $private_key);
file_put_contents('sharedsecret.pem', $shared_secret);
?>
