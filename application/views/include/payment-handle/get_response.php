<?php ob_start(); ?>
<?php SESSION_START(); ?>
<?php

/* -----------------------------------------------------------------------------

 Version 2.0

------------------ Disclaimer --------------------------------------------------

Copyright 2004 Dialect Holdings.  All rights reserved.

This document is provided by Dialect Holdings on the basis that you will treat
it as confidential.

No part of this document may be reproduced or copied in any form by any means
without the written permission of Dialect Holdings.  Unless otherwise expressly
agreed in writing, the information contained in this document is subject to
change without notice and Dialect Holdings assumes no responsibility for any
alteration to, or any error or other deficiency, in this document.

All intellectual property rights in the Document and in all extracts and things
derived from any part of the Document are owned by Dialect and will be assigned
to Dialect on their creation. You will protect all the intellectual property
rights relating to the Document in a manner that is equal to the protection
you provide your own intellectual property.  You will notify Dialect
immediately, and in writing where you become aware of a breach of Dialect's
intellectual property rights in relation to the Document.

The names "Dialect", "QSI Payments" and all similar words are trademarks of
Dialect Holdings and you must not use that name or any similar name.

Dialect may at its sole discretion terminate the rights granted in this
document with immediate effect by notifying you in writing and you will
thereupon return (or destroy and certify that destruction to Dialect) all
copies and extracts of the Document in its possession or control.

Dialect does not warrant the accuracy or completeness of the Document or its
content or its usefulness to you or your merchant customers.   To the extent
permitted by law, all conditions and warranties implied by law (whether as to
fitness for any particular purpose or otherwise) are excluded.  Where the
exclusion is not effective, Dialect limits its liability to $100 or the
resupply of the Document (at Dialect's option).

Data used in examples and sample data files are intended to be fictional and
any resemblance to real persons or companies is entirely coincidental.

Dialect does not indemnify you or any third party in relation to the content or
any use of the content as contemplated in these terms and conditions.

Mention of any product not owned by Dialect does not constitute an endorsement
of that product.

This document is governed by the laws of New South Wales, Australia and is
intended to be legally binding.

-------------------------------------------------------------------------------

Following is a copy of the disclaimer / license agreement provided by RSA:

Copyright (C) 1991-2, RSA Data Security, Inc. Created 1991. All rights reserved.

License to copy and use this software is granted provided that it is identified
as the "RSA Data Security, Inc. MD5 Message-Digest Algorithm" in all material 
mentioning or referencing this software or this function.

License is also granted to make and use derivative works provided that such 
works are identified as "derived from the RSA Data Security, Inc. MD5 
Message-Digest Algorithm" in all material mentioning or referencing the 
derived work.

RSA Data Security, Inc. makes no representations concerning either the 
merchantability of this software or the suitability of this software for any 
particular purpose. It is provided "as is" without express or implied warranty 
of any kind.

These notices must be retained in any copies of any part of this documentation 
and/or software.

-------------------------------------------------------------------------------- 
 
This example assumes that a form has been sent to this example with the
required fields. The example then processes the command and displays the
receipt or error to a HTML page in the users web browser.

NOTE:
=====
  You may have installed the libeay32.dll and ssleay32.dll libraries 
  into your x:\WINNT\system32 directory to run this example.

--------------------------------------------------------------------------------

 @author Dialect Payment Solutions Pty Ltd Group 

------------------------------------------------------------------------------*/

// *********************
// START OF MAIN PROGRAM
// *********************

// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
$SECURE_SECRET = "B4264D743B97609FD46E3FA264FBF16F";

// If there has been a merchant secret set then sort and loop through all the
// data in the Virtual Payment Client response. While we have the data, we can
// append all the fields that contain values (except the secure hash) so that
// we can create a hash and validate it against the secure hash in the Virtual
// Payment Client response.

// NOTE: If the vpc_TxnResponseCode in not a single character then
// there was a Virtual Payment Client error and we cannot accurately validate
// the incoming data from the secure hash. */

// get and remove the vpc_TxnResponseCode code from the response fields as we
// do not want to include this field in the hash calculation
$vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
unset($_GET["vpc_SecureHash"]); 

// set a flag to indicate if hash has been validated
$errorExists = false;

if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {

    $md5HashData = $SECURE_SECRET;

    // sort all the incoming vpc response fields and leave out any with no value
    foreach($_GET as $key => $value) {
        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
            $md5HashData .= $value;
        }
    }
    
    // Validate the Secure Hash (remember MD5 hashes are not case sensitive)
	// This is just one way of displaying the result of checking the hash.
	// In production, you would work out your own way of presenting the result.
	// The hash check is all about detecting if the data has changed in transit.
    if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(md5($md5HashData))) {
        // Secure Hash validation succeeded, add a data field to be displayed
        // later.
        $hashValidated = "<FONT color='#00AA00'><strong>CORRECT</strong></FONT>";
    } else {
        // Secure Hash validation failed, add a data field to be displayed
        // later.
        $hashValidated = "<FONT color='#FF0066'><strong>INVALID HASH</strong></FONT>";
        $errorExists = true;
    }
} else {
    // Secure Hash was not validated, add a data field to be displayed later.
    $hashValidated = "<FONT color='orange'><strong>Not Calculated - No 'SECURE_SECRET' present.</strong></FONT>";
}

// Define Variables
// ----------------
// Extract the available receipt fields from the VPC Response
// If not present then let the value be equal to 'No Value Returned'

// Standard Receipt Data
$amount          = null2unknown($_GET["vpc_Amount"]);
$locale          = null2unknown($_GET["vpc_Locale"]);
$batchNo         = null2unknown($_GET["vpc_BatchNo"]);
$command         = null2unknown($_GET["vpc_Command"]);
$message         = null2unknown($_GET["vpc_Message"]);
$version         = null2unknown($_GET["vpc_Version"]);
$cardType        = null2unknown($_GET["vpc_Card"]);
$orderInfo       = null2unknown($_GET["vpc_OrderInfo"]);
$receiptNo       = null2unknown($_GET["vpc_ReceiptNo"]);
$merchantID      = null2unknown($_GET["vpc_Merchant"]);
$authorizeID     = null2unknown($_GET["vpc_AuthorizeId"]);
$merchTxnRef     = null2unknown($_GET["vpc_MerchTxnRef"]);
$transactionNo   = null2unknown($_GET["vpc_TransactionNo"]);
$acqResponseCode = null2unknown($_GET["vpc_AcqResponseCode"]);
$txnResponseCode = null2unknown($_GET["vpc_TxnResponseCode"]);


// 3-D Secure Data
$verType         = array_key_exists("vpc_VerType", $_GET)          ? $_GET["vpc_VerType"]          : "No Value Returned";
$verStatus       = array_key_exists("vpc_VerStatus", $_GET)        ? $_GET["vpc_VerStatus"]        : "No Value Returned";
$token           = array_key_exists("vpc_VerToken", $_GET)         ? $_GET["vpc_VerToken"]         : "No Value Returned";
$verSecurLevel   = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";
$enrolled        = array_key_exists("vpc_3DSenrolled", $_GET)      ? $_GET["vpc_3DSenrolled"]      : "No Value Returned";
$xid             = array_key_exists("vpc_3DSXID", $_GET)           ? $_GET["vpc_3DSXID"]           : "No Value Returned";
$acqECI          = array_key_exists("vpc_3DSECI", $_GET)           ? $_GET["vpc_3DSECI"]           : "No Value Returned";
$authStatus      = array_key_exists("vpc_3DSstatus", $_GET)        ? $_GET["vpc_3DSstatus"]        : "No Value Returned";

// *******************
// END OF MAIN PROGRAM
// *******************

// FINISH TRANSACTION - Process the VPC Response Data
// =====================================================
// For the purposes of demonstration, we simply display the Result fields on a
// web page.

// Show 'Error' in title if an error condition
$errorTxt = "";
//var_dump($txnResponseCode); exit();
// Show this page as an error page if vpc_TxnResponseCode equals '7'
if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {
    $errorTxt = "Error ";
}
    
// This is the display title for 'Receipt' page 
$title = $_GET["Title"];

// The URL link for the receipt to do another transaction.
// Note: This is ONLY used for this example and is not required for 
// production code. You would hard code your own URL into your application
// to allow customers to try another transaction.
//TK//$againLink = URLDecode($_GET["AgainLink"]);

?>
<?php
if($txnResponseCode == "0" || $txnResponseCode == "Transaction Successful"){
	include_once("../../daily-booking/class/config.php");
	include_once("../../daily-booking/class/class-database.php");
	include_once("../../daily-booking/class/class-control.php");
	$db = new Database1();
	$sql = "UPDATE tbl_ticket SET status='Paid', transaction_number='{$transactionNo}', payment_type='{$cardType}' WHERE booking_code={$_SESSION['booking_code']}";
	$res = $db->con->query($sql);
	//header("Refresh: 2; url=http://www.vcu.asia/confirm_booking_seats");
	header("Location: /confirm_booking_seats");
}else{
	include_once("../../daily-booking/class/config.php");
	include_once("../../daily-booking/class/class-database.php");
	include_once("../../daily-booking/class/class-control.php");
	$db = new Database1();
	$sql = "DELETE FROM tbl_ticket WHERE booking_code={$_SESSION['booking_code']}";
	$res = $db->con->query($sql);
	//header("Refresh: 2; url=http://www.vcu.asia/ipg-unsuccess.html?message=$message");
	header("Location: /ipg-unsuccess.html?message=$message");
}
?>
<?    
// End Processing

// This method uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
function getResponseDescription($responseCode) {

    switch ($responseCode) {
        case "0" : $result = "Transaction Successful"; break;
        case "?" : $result = "Transaction status is unknown"; break;
        case "1" : $result = "Unknown Error"; break;
        case "2" : $result = "Bank Declined Transaction"; break;
        case "3" : $result = "No Reply from Bank"; break;
        case "4" : $result = "Expired Card"; break;
        case "5" : $result = "Insufficient funds"; break;
        case "6" : $result = "Error Communicating with Bank"; break;
        case "7" : $result = "Payment Server System Error"; break;
        case "8" : $result = "Transaction Type Not Supported"; break;
        case "9" : $result = "Bank declined transaction (Do not contact Bank)"; break;
        case "A" : $result = "Transaction Aborted"; break;
        case "C" : $result = "Transaction Cancelled"; break;
        case "D" : $result = "Deferred transaction has been received and is awaiting processing"; break;
        case "F" : $result = "3D Secure Authentication failed"; break;
        case "I" : $result = "Card Security Code verification failed"; break;
        case "L" : $result = "Shopping Transaction Locked (Please try the transaction again later)"; break;
        case "N" : $result = "Cardholder is not enrolled in Authentication scheme"; break;
        case "P" : $result = "Transaction has been received by the Payment Adaptor and is being processed"; break;
        case "R" : $result = "Transaction was not processed - Reached limit of retry attempts allowed"; break;
        case "S" : $result = "Duplicate SessionID (OrderInfo)"; break;
        case "T" : $result = "Address Verification Failed"; break;
        case "U" : $result = "Card Security Code Failed"; break;
        case "V" : $result = "Address Verification and Card Security Code Failed"; break;
        default  : $result = "Unable to be determined"; 
    }
    return $result;
}



//  -----------------------------------------------------------------------------

// This method uses the verRes status code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code

// @param statusResponse String containing the 3DS Authentication Status Code
// @return String containing the appropriate description

function getStatusDescription($statusResponse) {
    if ($statusResponse == "" || $statusResponse == "No Value Returned") {
        $result = "3DS not supported or there was no 3DS data provided";
    } else {
        switch ($statusResponse) {
            Case "Y"  : $result = "The cardholder was successfully authenticated."; break;
            Case "E"  : $result = "The cardholder is not enrolled."; break;
            Case "N"  : $result = "The cardholder was not verified."; break;
            Case "U"  : $result = "The cardholder's Issuer was unable to authenticate due to some system error at the Issuer."; break;
            Case "F"  : $result = "There was an error in the format of the request from the merchant."; break;
            Case "A"  : $result = "Authentication of your Merchant ID and Password to the ACS Directory Failed."; break;
            Case "D"  : $result = "Error communicating with the Directory Server."; break;
            Case "C"  : $result = "The card type is not supported for authentication."; break;
            Case "S"  : $result = "The signature on the response received from the Issuer could not be validated."; break;
            Case "P"  : $result = "Error parsing input from Issuer."; break;
            Case "I"  : $result = "Internal Payment Server system error."; break;
            default   : $result = "Unable to be determined"; break;
        }
    }
    return $result;
}

//  -----------------------------------------------------------------------------
   
// If input is null, returns string "No Value Returned", else returns input
function null2unknown($data) {
    if ($data == "") {
        return "No Value Returned";
    } else {
        return $data;
    }
} 
    
//  ----------------------------------------------------------------------------