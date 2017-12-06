<?php include_once("include/functions.php") ?>
<form action="./include/payment-handle/vpc_php_serverhost_do.php" method="post">
	<input type="hidden" name="Title" value="<?php echo Encrypt('mykey', 'PHP VPC 3-Party'); ?>">
	<input type="hidden" name="virtualPaymentClientURL" size="63" value="<?php echo Encrypt('mykey', 'https://migs-mtf.mastercard.com.au/vpcpay'); ?>">
	<input type="hidden" name="vpc_Version" value="<?php echo Encrypt('mykey', '1'); ?>" size="20" maxlength="8">
	<input type="hidden" name="vpc_Command" value="<?php echo Encrypt('mykey', 'pay'); ?>" size="20" maxlength="16">
	<input type="hidden" name="vpc_AccessCode" value="<?php echo Encrypt('mykey', '9A3BD96C'); ?>">
	<input type="hidden" name="vpc_MerchTxnRef" value="<?php echo Encrypt('mykey', $invoice_no); ?>">
	<input type="hidden" name="vpc_Merchant" value="<?php echo Encrypt('mykey', 'TESTVCU'); ?>">
	<input type="hidden" name="vpc_OrderInfo" value="<?php echo Encrypt('mykey', $passenger_name); ?>">
	<input type="hidden" name="vpc_Amount" value="<?php echo Encrypt('mykey', $amount*100); ?>">
	<input type="hidden" name="vpc_Locale" value="<?php echo Encrypt('mykey', 'en'); ?>" size="20" maxlength="5">
	<input type="hidden" name="securehashsecret" size="63" value="<?php echo Encrypt('mykey', 'EFABBCE2ADA8C7978E0ED92069941757'); ?>">
	<input type="hidden" name="vpc_ReturnURL" size="63" value="<?php echo Encrypt('mykey', 'http://i1booking.com/include/payment-handle/get_response.php'); ?>">
	<button type="submit" name="SubButL"><img src="images/payment-logo/payment_visa.png" /></button>
  </form>