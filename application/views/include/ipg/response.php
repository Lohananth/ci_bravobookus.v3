<?php

$decrypted = '';
$encrypted = $_POST['merchantReciept'];
//echo $encrypted;
//echo "<br /><br />";

//key should be 64 Characters per line
$privateKey = <<<EOD
-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAMt7lPt+W7GDVa71
oqeWpDB/kkxlDnX56Vl1c9AboeG1OXOim/Lc2Trq25+gZcwIq54OcRo/j+jsQQKH
B7Zzl65kIlXWGBS7ANBjKLftXFMd5ijneFfjCRBtv5s4QF+tEyanLRBWIpM9pUaH
+dsSNCzDvxIG8IFLK8p6SwaLt8lDAgMBAAECgYBl3S/v1onAi6bRN1Z93wPC45ox
dEWQ+dK/XfTkMXEQtNBV+wlmwvhcbkYT2xAa3BxNu50TLs60I9FHmqFZzPQZDE59
x2LrqwZ2ehaMJIbjX4T/Omw+VZwI85+BBBXXTUgMm8V9qEEH3ZiKFf+F01j5bnwE
/EHUJiuHJY/pN8cbwQJBAPIWoi2ahq3P7hLeWxU29I0pUAsuTDVXe2v9Z5dz7UN1
RhV+G6B/yq81ySfkLsf95oP77FGRDo/0l0Hig5rmA0UCQQDXLQUTSsfPP/qXmgd8
q+S5/zagJeV17kTreEF1TFOs+h/2O1X7v39YD6v0dBcjFOcekp3vP7vUX/vXiKtU
0d7nAkAlbFBHwnJ9Xf5Mlmj4H5WwWKmSAOcw+8QNjo+7/uS3n+Jkoij9J6Qab7MX
4pNEwUAoOQJwHX9ly4ayXaTAhjwNAkEAnCmNNGoiRxRMvvfHlUB/WEmTkHjQZl1N
YYM+Jm4FkFVbGu4HQhTBy9xb1KboH8rMzZBk1LzxiXk7ojoK9hz2YwJAVyGAQoCo
PBYBZZXsud4SBu9Zwb6bggDf7iUTZ9KlHSuM5pOEvUUNA4MzZ2ZEvk6vAt0XHx6u
pcfavFII7ufosg==
-----END PRIVATE KEY-----
EOD;

$encrypted = base64_decode($encrypted); //decode the encrypted query string
if (!openssl_private_decrypt($encrypted, $decrypted, $privateKey)) die('Failed to decrypt data');

//echo "Decrypted value: ". $decrypted;
?>