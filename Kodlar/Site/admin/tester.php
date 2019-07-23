<?php
		$url="http://api.txtlocal.com/send/?";
		$istek=array(
					"type" => "A",
					"name" => $domain,
					"content" => $veri["ip"],
					"ttl" => 120,
					"proxied" => false
					);
		$curl_header=array(
			'X-Auth-Email: '.$email,
			'X-Auth-Key: '.$apikey,
			'Content-Type: application/json'
		);
		$istek=json_encode($istek);
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$curl_header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $istek);

		$result = curl_exec($ch);
		curl_close($ch);
var_dump($result);
?>