<?php
/* used to find the key for the XOR encryption in natas11.
 *
 * most of the php code in this file comes from (or is inspired by) the source
 * code file given for natas11.
 *
 * solution for splitting long string across multiple lines found in this stack
 * overflow post: https://stackoverflow.com/a/6699948
 */
$cookie = base64_decode("MGw7JCQ5OC04PT8jOSpqdmkgJ25nbCorKCEkIzlscm5oKC4qLSgu".
"bjY%3D");
echo $cookie, "\n", strlen($cookie), "\n";
$defaultdata = json_encode(array( "showpassword"=>"no", "bgcolor"=>"#ffffff"));
echo $defaultdata, "\n", strlen($defaultdata), "\n";
$text = '';
for($i=0;$i<strlen($cookie);$i++) {
        $text .= $cookie[$i] ^ $defaultdata[$i];
}
echo $text, "\n";
?>

