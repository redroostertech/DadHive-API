<?php
	
	// Turn off error reporting
    error_reporting(0);
    
    
	//firebase database link
	$firebaseDb_URL="https://dadhive-18a20-default-rtdb.firebaseio.com/Match";
	$firebaseDb_URL_MainDb="https://dadhive-18a20-default-rtdb.firebaseio.com/";
	
	//https://i.gyazo.com/f1e5ba9f40c39abfdec1a01325c59cbd.png 
	//you can get server key from here for enable push notificaton 
	define("firebase_key","AAAAHAGWlcw:APA91bEqgkDYHX6diuqG2U75bFQ0FVwA3pPikwzmN7oU0uDHBMsaZDHMEXtLeTvupvrP0K5_KDpZmulOLw3JIBUMrvCR_H4qGGZo54Cv5MMwwEo_pmF9pOjjrtjmmPLw4fZZ04pJaQkZ");
	
	//database configration
	$servername = "localhost";
	$database = "heroku_03e4adbfdb699b3";
	$username = "bec2fe74a32401";
	$password = "26fd4c76";
	// Create connection

	$conn = mysqli_connect($servername, $username, $password, $database);
	mysqli_query($conn,"SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");

	// Check connection

	if (!$conn) {

	    die("Connection failed: " . mysqli_connect_error());

	}
	
	
	function sendPushNotificationToMobileDevice($data)
    {
    	$key=firebase_key;
      
    	$curl = curl_init();
    	
    	curl_setopt_array($curl, array(
    		CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_ENCODING => "",
    		CURLOPT_MAXREDIRS => 10,
    		CURLOPT_TIMEOUT => 30,
    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $data,
    		CURLOPT_HTTPHEADER => array(
    			"authorization: key=".$key."",
    			"cache-control: no-cache",
    			"content-type: application/json",
    			"postman-token: 85f96364-bf24-d01e-3805-bccf838ef837"
    		),
    	));
    
    	$response = curl_exec($curl);
    	$err = curl_error($curl);
    
    	curl_close($curl);
    
    	if ($err) 
    	{
    	   print_r($err);
    	} 
    	else 
    	{
    		print_r($response);
    	}
    
    }
    
	
?>
