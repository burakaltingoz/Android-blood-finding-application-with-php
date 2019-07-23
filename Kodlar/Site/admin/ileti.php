<?php
	// Textlocal account details
	$username = '-----';
	$hash = '2fbdece455700fe18e57c61150fdae653c2a87ab5fe9de29441ddcdf8c817d49';
	
	// Message details
	$numbers = array(+905314908027);
	$sender = "Acil Kan";
	$message ="Acil kanınıza ihtiyacımız var.";
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	var_dump($response);
	// Process your response here
	echo $response;
?>