<?php 

	include ('configuration.php');

	$url = $base_url.'/oauth/v1/generate?grant_type=client_credentials';
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$result = json_decode($result);
	
	//print curl_error($curl);

	$access_token = $result->access_token;
	
	print_r('token is '. $access_token);

	curl_close($curl);
?>
