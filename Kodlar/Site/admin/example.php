<?php
	// Authorisation details.
	$username = "ismail.tanrikulu@gmail.com";
	$hash = "2fbdece455700fe18e57c61150fdae653c2a87ab5fe9de29441ddcdf8c817d49";

	$test = "0";

	
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = "905456816866"; // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
 var_dump($result);
?>