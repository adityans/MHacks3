<?php

 class Venmo {

 	public $apiSecret = "6UHgQf2wDX2c6YScHf9Z73ku3v8tNsRj";
 	public $apiID = "1552";
 	private $accessToken;

 	public function login()
	{
		header("Location: https://api.venmo.com/v1/oauth/authorize?client_id=1552&scope=make_payments%20access_profile");
	}

	public function setToken()
	{
		$accessToken = $_REQUEST['access_token'];
	}
	
	public function getUserData()
	{
		 $header = array(
        'Authorization: Bearer ' . $accessToken,
        );
    
		$request = "https://api.venmo.com/v1/me";
    	$ch = curl_init($request);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    	$response = curl_exec($ch);
    	$error = curl_error($ch);

    	if ($error != '')
    	{
        	error_log('Curl error: ' . $error);
        	header('HTTP/1.0 502 Bad Gateway', true, 502);
        	exit;
    	}
    	else
    	{
    		return $response;
    	}
	}

	public function accessData($jsonObject)
	{
		return json_decode($jsonObject);
	}

	public function makePayment($recipientID, $notes, $amount)
	{
		 $header = array(
        'Authorization: Bearer ' . $accessToken,
        );

		$request = "https://api.venmo.com/v1/payments?email=" . $recipientID . "&note=" . $notes . "&amount=" . $amount;

		$ch = curl_init($request);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    	$response = curl_exec($ch);
    	$error = curl_error($ch);

    	if ($error != '')
    	{
        	error_log('Curl error: ' . $error);
        	header('HTTP/1.0 502 Bad Gateway', true, 502);
        	exit;
    	}
    	else
    	{
    		return $response;
    	}
	}

};



	

?>