<?php

$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"https://admin.citruspay.com/api/v2/txn/enquiry/5614ee9fa0fda");

		curl_setopt($ch, CURLOPT_GET, 1);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		

		$headers = array();

		$headers[] = 'access_key: TSM9NRK8GI01W8LYLHKR';

		$headers[] = 'Accept: application/json';

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$server_output = curl_exec ($ch);

		curl_close ($ch);

		$jsonData=str_replace('{"enquiryResponse":[{','',$server_output);

		$jsonData=str_replace('}]}','',$jsonData);

		echo $jsonData;

?>

