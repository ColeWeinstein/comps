<?php
/* used to generate a cookie to solve natas11, given the right XOR key.
 *
 * $key generated using findkey.php, also in this folder.
 * 
 * most of the php code in this file comes from (or is inspired by) the source
 * code file given for natas11.
 */
$key = "KNHL";
$mydata = json_encode(array("showpassword"=>"yes", "bgcolor"=>"#dd8855"));
$cookie = '';
for($i=0;$i<strlen($mydata);$i++) {
        $cookie .= $mydata[$i] ^ $key[$i % strlen($key)];
}
echo base64_encode($cookie);
?>

