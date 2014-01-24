<?php

 class Venmo {

 	public $apiSecret = "6UHgQf2wDX2c6YScHf9Z73ku3v8tNsRj";
 	public $apiID = "1552";

 	public function login()
	{
		header("Location: https://api.venmo.com/v1/oauth/authorize?client_id=1552&scope=make_payments%20access_profile");
	}

    public function getAccess($code)
    {
        $request = "https://api.venmo.com/v1/oauth/access_token";
        $ch = curl_init($request);

         $requestBody = array(
            'client_id' => '1552',
            'code' => $code,
            'client_secret' => '6UHgQf2wDX2c6YScHf9Z73ku3v8tNsRj',
        );
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);

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
	
	public function getUserData($accessToken)
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

	public function makePayment($accessToken, $recipientID, $notes, $amount)
	{
		 $header = array(
        'Authorization: Bearer ' . $accessToken,
        );

		$request = "https://api.venmo.com/v1/payments";

		$ch = curl_init($request);

        curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $requestBody = array(
            'user_id' => $recipientID,
            'note' => "payment through taskwall",
            'amount' => $amount,
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);

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