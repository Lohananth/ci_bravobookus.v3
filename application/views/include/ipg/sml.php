<?php 
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include_once("include/functions.php");
$publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCP7+JW2sxMQRKlu9015YUHa1JV
yBDv+mQz7wzbg4HHQqRSrVGNwuBB1bJknKsGbogHaJEG0ZSnJU5+kzYfF8uylnla
h5I1kkqqDlkI+gV2aYQXM7e3LKBLtOs2ElLZfags06IzeJjdAH8Qe4pHizOL1MKm
jMiKensCliNwrUkUDwIDAQAB
-----END PUBLIC KEY-----
EOD;
//echo "Public Key : <br />";
nl2br($publicKey);
//echo "<br />";
//echo "<br />";
$mcode = "vcuasia";//merchant code
//just a random number
//you can use uniqid()
$tid = "TX1_" . rand(1233, 9878); // transaction id
$tamount =  $amount; //number_format((($_POST['txtTotalSeats']) * ($_POST['local_price'])),2); //transaction amount
$rurl = "http://www.vcu.asia/confirm_booking_seats.html?smartluy=paid";
//echo "//data <br />";
$sensitiveData = $mcode.'|'.$tid.'|'.$tamount.'|'.$rurl; // query string
//echo "<br /><br />";
$encrypted = '';
if (!openssl_public_encrypt($sensitiveData, $encrypted, $publicKey)) die('Failed to encrypt data');
//echo "encrypted Cipher:<br />";
$encrypted;
//file_put_contents("encryptedFile.txt",$encrypted);
$invoice = base64_encode($encrypted); // encoded encrypted query string 
//echo "<br />";echo "<br />";
//echo "//base64_encode <br />";
//file_put_contents("encryptedNEncodedFile.txt",$invoice);
$invoice;
//echo "<br />";
time();
?>
<form action="https://ipg.smartluy.com.kh/smartLuyIPGExtranet/servlet_sentinal" method="post">
 <input type="hidden" value="<?php echo $invoice; ?>" name="merchantInvoice">
 <button type="submit" name="a" id="a"><img src="images/payment-logo/SmartLuyLogo_OK-01.png" width="100" alt=""></button>
</form>