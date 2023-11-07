<?php
	$decoded = base64_decode($_COOKIE['__utp']);
	$result = explode('"email":', $decoded);
	$email_arr = explode('"', $result[1]);
	$email = $email_arr[1];
	if ($email) {
		$curl = curl_init();
		$curl_url = "https://app.adestra.com/api/rest/1/core_tables/44/contacts?search=%7B%22email%22:%22" . $email . "%22%7D";

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $curl_url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Basic " . $_ENV["adestraauthcode"],
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$decoded = json_decode($response);
		$adestra_id = $decoded->contacts[0]->id;
		curl_close($curl);
		$curl = curl_init();
		$curl_url = 'https://app.adestra.com/api/rest/1/contacts/' . $adestra_id . '/lists/6043';
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $curl_url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Basic " . $_ENV["adestraauthcode"],
			"Content-Type: application/json"
		  ),
		));
		$response = curl_exec($curl);
		$decoded = json_decode($response);
		print_r($decoded);
	}
	else {
		print('Please <a href="javascript:tp.pianoId.show(\'login\');">login/register</a> to request the PDF');
	}
?>
