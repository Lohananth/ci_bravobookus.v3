<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require('PaymentCodesHelper.php');

class VPCPaymentConnection extends CI_Controller {
	
	// Define Variables
	// ----------------

	private $errorExists = false;             // Indicates if an error exists
	private $errorMessage;                    // The error message
	
	private $postData;                        // Data to be posted to the payment server
	
	private $responseMap;                     // Array of receipt data 
	
	private $secureHashSecret;                // Used for one way hashing in 3-party transactions
	private $hashInput;
	private $message;
	function __construct() {
	 	parent::__construct();
        $this->load->helper('url');
        $this->load->helper('PaymentCodes');
        $this->load->library('session');
    }

	public function doPayment(){
		// This is secret for encoding the SHA256 hash
		// This secret will vary from merchant to merchant

		$secureSecret = "AD68AA08F19A9EBAC53A42DD732A62F0";

		// Set the Secure Hash Secret used by the VPC connection object
		$this->setSecureSecret($secureSecret);


		// *******************************************
		// START OF MAIN PROGRAM
		// *******************************************
		// Sort the POST data - it's important to get the ordering right

		$post = $this->input->post();
		ksort($post);
		// add the start of the vpcURL querystring parameters
		$vpcURL = trim($this->input->post("virtualPaymentClientURL"));

		// This is the title for display
		$title  = trim($this->input->post("Title"));


		// Remove the Virtual Payment Client URL from the parameter hash as we 
		// do not want to send these fields to the Virtual Payment Client.
		unset($post["virtualPaymentClientURL"]); 
		unset($post["SubButL"]);
		unset($post["Title"]);
		
		// Add VPC post data to the Digital Order
		foreach($post as $key => $value) {
			$tmp_value = trim($value);
			if (strlen($tmp_value) > 0) {
				$this->addDigitalOrderField($key, $tmp_value);
			}
		}

		// Add original order HTML so that another transaction can be attempted.
		$this->addDigitalOrderField("AgainLink", $againLink);

		// Obtain a one-way hash of the Digital Order data and add this to the Digital Order
		$secureHash = $this->hashAllFields();
		$this->addDigitalOrderField("Title", $title);
		$this->addDigitalOrderField("vpc_SecureHash", $secureHash);
		$this->addDigitalOrderField("vpc_SecureHashType", "SHA256");

		// Obtain the redirection URL and redirect the web browser
		$vpcURL = $this->getDigitalOrder($vpcURL); //echo $vpcURL; exit();
		header("Location: ".$vpcURL);
		//echo "<a href=$vpcURL>$vpcURL</a>";
	}

	public function getPaymentRespone(){

		// This is secret for encoding the SHA256 hash
		// This secret will vary from merchant to merchant

		$secureSecret = "AD68AA08F19A9EBAC53A42DD732A62F0";

		// Set the Secure Hash Secret used by the VPC connection object
		$this->setSecureSecret($secureSecret);


		// Set the error flag to false
		$errorExists = false;



		// *******************************************
		// START OF MAIN PROGRAM
		// *******************************************


		// This is the title for display
		//$title  = $_GET["Title"];


		// Add VPC post data to the Digital Order
		foreach($this->input->get() as $key => $value) {
			if (($key!="vpc_SecureHash") && ($key != "vpc_SecureHashType") && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
				$this->addDigitalOrderField($key, $value);
			}
		}

		// Obtain a one-way hash of the Digital Order data and
		// check this against what was received.
		$serverSecureHash	= array_key_exists("vpc_SecureHash", $this->input->get())	? $this->input->get("vpc_SecureHash") : "";
		$secureHash = $this->hashAllFields();
		if ($secureHash==$serverSecureHash) {
			$hashValidated = "<font color='#00AA00'><strong>CORRECT</strong></font>";
		} else {
			$hashValidated = "<font color='#FF0066'><strong>INVALID HASH</strong></font>";
			$errorsExist = true;
		}



		    
		/*  If there has been a merchant secret set then sort and loop through all the
		    data in the Virtual Payment Client response. while we have the data, we can
		    append all the fields that contain values (except the secure hash) so that
		    we can create a hash and validate it against the secure hash in the Virtual
		    Payment Client response.

		    NOTE: If the vpc_TxnResponseCode in not a single character then
		    there was a Virtual Payment Client error and we cannot accurately validate
		    the incoming data from the secure hash. 

		    // remove the vpc_TxnResponseCode code from the response fields as we do not 
		    // want to include this field in the hash calculation
		    
		    if (secureSecret != null && secureSecret.length() > 0 && 
		        (fields.get("vpc_TxnResponseCode") != null || fields.get("vpc_TxnResponseCode") != "No Value Returned")) {
		        
		        // create secure hash and append it to the hash map if it was created
		        // remember if secureSecret = "" it wil not be created
		        String secureHash = vpc3conn.hashAllFields(fields);
		    
		        // Validate the Secure Hash (remember  hashes are not case sensitive)
		        if (vpc_Txn_Secure_Hash.equalsIgnoreCase(secureHash)) {
		            // Secure Hash validation succeeded, add a data field to be 
		            // displayed later.
		            hashValidated = "<font color='#00AA00'><strong>CORRECT</strong></font>";
		        } else {
		            // Secure Hash validation failed, add a data field to be
		            // displayed later.
		            errorExists = true;
		            hashValidated = "<font color='#FF0066'><strong>INVALID HASH</strong></font>";
		        }
		    } else {
		        // Secure Hash was not validated, 
		        hashValidated = "<font color='orange'><strong>Not Calculated - No 'SECURE_SECRET' present.</strong></font>";
		    }
		*/

		    // Extract the available receipt fields from the VPC Response
		    // If not present then let the value be equal to 'Unknown'
		    // Standard Receipt Data


		$Title 				= array_key_exists("Title", $this->input->get()) 						? $this->input->get("Title") 				: "";
		$againLink 			= array_key_exists("AgainLink", $this->input->get()) 					? $this->input->get("AgainLink") 			: "";
		$amount 			= array_key_exists("vpc_Amount", $this->input->get()) 				? $this->input->get("vpc_Amount") 			: "";
		$locale 			= array_key_exists("vpc_Locale", $this->input->get()) 				? $this->input->get("vpc_Locale") 			: "";
		$batchNo 			= array_key_exists("vpc_BatchNo", $this->input->get()) 				? $this->input->get("vpc_BatchNo") 			: "";
		$command 			= array_key_exists("vpc_Command", $this->input->get()) 				? $this->input->get("vpc_Command") 			: "";
		$message 			= array_key_exists("vpc_Message", $this->input->get()) 				? $this->input->get("vpc_Message")			: "";
		$version  			= array_key_exists("vpc_Version", $this->input->get()) 				? $this->input->get("vpc_Version") 			: "";
		$cardType   		= array_key_exists("vpc_Card", $this->input->get()) 					? $this->input->get("vpc_Card") 			: "";
		$orderInfo 			= array_key_exists("vpc_OrderInfo", $this->input->get()) 				? $this->input->get("vpc_OrderInfo") 		: "";
		$receiptNo 			= array_key_exists("vpc_ReceiptNo", $this->input->get()) 				? $this->input->get("vpc_ReceiptNo") 		: "";
		$merchantID  		= array_key_exists("vpc_Merchant", $this->input->get()) 				? $this->input->get("vpc_Merchant") 		: "";
		$merchTxnRef 		= array_key_exists("vpc_MerchTxnRef", $this->input->get()) 			? $this->input->get("vpc_MerchTxnRef")		: "";
		$authorizeID 		= array_key_exists("vpc_AuthorizeId", $this->input->get()) 			? $this->input->get("vpc_AuthorizeId") 		: "";
		$transactionNo  	= array_key_exists("vpc_TransactionNo", $this->input->get()) 			? $this->input->get("vpc_TransactionNo") 	: "";
		$acqResponseCode 	= array_key_exists("vpc_AcqResponseCode", $this->input->get()) 		? $this->input->get("vpc_AcqResponseCode") 	: "";
		$txnResponseCode 	= array_key_exists("vpc_TxnResponseCode", $this->input->get()) 		? $this->input->get("vpc_TxnResponseCode") 	: "";
		$riskOverallResult	= array_key_exists("vpc_RiskOverallResult", $this->input->get()) 		? $this->input->get("vpc_RiskOverallResult"): "";

				// Obtain the 3DS response
		$vpc_3DSECI				= array_key_exists("vpc_3DSECI", $this->input->get()) 			? $this->input->get("vpc_3DSECI") : "";
		$vpc_3DSXID				= array_key_exists("vpc_3DSXID", $this->input->get()) 			? $this->input->get("vpc_3DSXID") : "";
		$vpc_3DSenrolled 		= array_key_exists("vpc_3DSenrolled", $this->input->get()) 		? $this->input->get("vpc_3DSenrolled") : "";
		$vpc_3DSstatus 			= array_key_exists("vpc_3DSstatus", $this->input->get()) 			? $this->input->get("vpc_3DSstatus") : "";
		$vpc_VerToken 			= array_key_exists("vpc_VerToken", $this->input->get()) 			? $this->input->get("vpc_VerToken") : "";
		$vpc_VerType 			= array_key_exists("vpc_VerType", $this->input->get()) 			? $this->input->get("vpc_VerType") : "";
		$vpc_VerStatus			= array_key_exists("vpc_VerStatus", $this->input->get()) 			? $this->input->get("vpc_VerStatus") : "";
		$vpc_VerSecurityLevel	= array_key_exists("vpc_VerSecurityLevel", $this->input->get()) 	? $this->input->get("vpc_VerSecurityLevel") : "";


		    // CSC Receipt Data
		$cscResultCode 	= array_key_exists("vpc_CSCResultCode", $this->input->get())  			? $this->input->get("vpc_CSCResultCode") : "";
		$ACQCSCRespCode = array_key_exists("vpc_AcqCSCRespCode", $this->input->get()) 			? $this->input->get("vpc_AcqCSCRespCode") : "";
		    
		// Get the descriptions behind the QSI, CSC and AVS Response Codes
		    // Only get the descriptions if the string returned is not equal to "No Value Returned".
		    
		$txnResponseCodeDesc = "";
		$cscResultCodeDesc = "";
		$avsResultCodeDesc = "";
		    
		    if ($txnResponseCode != "No Value Returned") {
		        $txnResponseCodeDesc = getResultDescription($txnResponseCode);
		    }
		    
		    if ($cscResultCode != "No Value Returned") {
		        $cscResultCodeDesc = getCSCResultDescription($cscResultCode);
		    }
		    
		    
				$error = "";
		    // Show this page as an error page if error condition
		    if ($txnResponseCode=="7" || $txnResponseCode=="No Value Returned" || $errorExists) {
		        $error = "Error ";
		    }

		if($txnResponseCode == "0" || $txnResponseCode == "Transaction Successful"){
			$booking_code = $this->session->userdata('booking_code');
		    $data = array('status'=>'paid');
		    $this->db->where('booking_code', $booking_code);
		    $this->db->update('tbl_ticket', $data);
		    $this->session->unset_userdata("booking_code");
		    $this->session->set_flashdata("ticket_number", $booking_code);
		    redirect(base_url()."ticket/get", 'refresh');
		}else{
			$data = array(
				"txnResponseCodeDesc"=>$txnResponseCodeDesc,
				"cscResultCodeDesc"=>$cscResultCodeDesc,
				"avsResultCodeDesc"=>$avsResultCodeDesc
			);
			$this->session->unset_userdata("booking_code");
			$this->session->set_flashdata("responeDesc", $data);
			redirect(base_url().'payment/unsuccess', 'refresh');
		}
	    
	  }

	public function unsuccessPayment(){
      $this->load->view("front/v_payment_unsuccess");
    }

	public function addDigitalOrderField($field, $value) {
		
		if (strlen($value) == 0) return false;      // Exit the function if no $value data is provided
		if (strlen($field) == 0) return false;      // Exit the function if no $value data is provided
		
		// Add the digital order information to the data to be posted to the Payment Server
		$this->postData .= (($this->postData=="") ? "" : "&") . urlencode($field) . "=" . urlencode($value);
		
		// Add the key's value to the hash input (only used for 3 party)
		$this->hashInput .= $field . "=" . $value . "&";
		
		return true;
		
	}

	public function sendMOTODigitalOrder($vpcURL, $proxyHostAndPort = "", $proxyUserPwd = "") {
		$message = "";
		// Generate and Send Digital Order (& receive DR)
		// *******************************************************

		
		// Exit if there is no data to send to the Virtual Payment Client
		if (strlen($this->postData) == 0) return false;
		
		
		// Get a HTTPS connection to VPC Gateway and do transaction
		// turn on output buffering to stop response going to browser
		ob_start();
		
		// initialise Client URL object
		$ch = curl_init();
		
		// set the URL of the VPC
		curl_setopt ($ch, CURLOPT_URL, $vpcURL);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $this->postData);
		
		if (strlen($proxyHostAndPort) > 0) {
			if (strlen($proxyUserPwd) > 0) {
				// (optional) set the proxy IP address, port and proxy username and password
				curl_setopt ($ch, CURLOPT_PROXY, $proxyHostAndPort, CURLOPT_PROXYUSERPWD, $proxyUserPwd);
			}
			else {
			// (optional) set the proxy IP address and port without proxy authentication
			curl_setopt ($ch, CURLOPT_PROXY, $proxyHostAndPort);
			
		  }
		  
		}
		
		// (optional) certificate validation
		// trusted certificate file
		//curl_setopt($ch, CURLOPT_CAINFO, "c:/temp/ca-bundle.crt");
		
		//turn on/off cert validation
		// 0 = don't verify peer, 1 = do verify
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
		// 0 = don't verify hostname, 1 = check for existence of hostame, 2 = verify
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		// connect
		curl_exec ($ch);
		
		// get response
		$response = ob_get_contents();
		
		// turn output buffering off.
		ob_end_clean();
		
		// set up message paramter for error outputs
		$this->errorMessage = "";
		
		// serach if $response contains html error code
		if(strchr($response,"<HTML>") || strchr($response,"<html>")) {;
		    $this->errorMessage = $response;
		} else {
		    // check for errors from curl
		    if (curl_error($ch))
		          $this->errorMessage = "curl_errno=". curl_errno($ch) . " (" . curl_error($ch) . ")";
		}
		

		// close client URL
		curl_close ($ch);
		
		// Extract the available receipt fields from the VPC Response
		// If not present then let the value be equal to 'No Value Returned'
		$this->responseMap = array();
		
		// process response if no errors
		if (strlen($message) == 0) {
		    $pairArray = explode("&", $response);
		    foreach ($pairArray as $pair) {
		        $param = explode("=", $pair);
		        $this->responseMap[urldecode($param[0])] = urldecode($param[1]);
		    }
		    
		    return true;
		    
		} else {
			
				return false;
				
		}

	}
	
	
	public function getDigitalOrder($vpcURL) {
		
		$redirectURL = $vpcURL."?".$this->postData;

		return $redirectURL;

		
	}

	
	public function decryptDR($digitalReceipt) {
		
		// Decrypt Digital Receipt
		// ********************************


		if (!$this->socketCreated) return false;        // Exit function if an the socket connection hasn't been created
		if ($this->errorExists) return false;           // Exit function if an error exists



		// (This primary command to decrypt the Digital Receipt)
    $cmdResponse = $this->sendCommand("3,$digitalReceipt");
    
    if (substr($cmdResponse,0,1) != "1") {
        // Retrieve the Payment Client Error (There may be none to retrieve)
        $cmdResponse = $this->sendCommand("4,PaymentClient.Error");
				if (substr($cmdResponse,0,1) == "1") {$exception = substr($cmdResponse,2);}

        $this->errorMessage = "(11) Digital Order has not created correctly - decryptDR($digitalReceipt) failed - $exception";
        $this->errorExists = true;
        
        return false;
        
    }

		// Set the socket timeout value to normal
		$this->payClientTimeout = $this->SHORT_SOCKET_TIMEOUT;

		// Automatically call the nextResult function
		$this->nextResult();
		
		return true;



		
	}
	
	
	public function getResultField($field) {
		

		return $this->null2unknown($field);

    
    //return substr($cmdResponse,0,1) == "1" ? substr($cmdResponse,2) : "";
    
	}


	public function getErrorMessage() {
		return $this->errorMessage;
	}
	
	
	public function setSecureSecret($secret) {		
		$this->secureHashSecret = $secret;
	}
	
	
	public function hashAllFields() {
		$this->hashInput=rtrim($this->hashInput,"&");
		return strtoupper(hash_hmac('SHA256',$this->hashInput, pack("H*",$this->secureHashSecret)));
	}


	private function null2unknown($key) {

		// This subroutine takes a data String and returns a predefined value if empty
		// If data Sting is null, returns string "No Value Returned", else returns input
		   
		// @param $in String containing the data String
		
		// @return String containing the output String

		if (array_key_exists($key, $this->responseMap)) {
		    if (!is_null($this->responseMap[$key])) {
		        return $this->responseMap[$key];
		    }
		} 
		return "No Value Returned";
	}

	
}

?>