<?php
	// Textlocal account details
	$username = urlencode('ismail.tanrikulu@gmail.com');
	$hash = urlencode('2fbdece455700fe18e57c61150fdae653c2a87ab5fe9de29441ddcdf8c817d49');
	
	// Message details
	$numbers = urlencode("+905314908027");
	$sender = urlencode('Jims Autos');
	$message = rawurlencode('This is your message');
 
	// Prepare data for POST request
	$data = 'username=' . $username . '&hash=' . $hash . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
 
	// Send the GET request with cURL
	$response = file_get_contents('http://api.txtlocal.com/send/?' . $data);
	
	
	// Process your response here
	var_dump($response);
?>