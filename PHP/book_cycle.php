<?php

    
    $from = $_POST["from"];
    $to = $_POST["to"];

    $from = str_replace(' ', '%', $from);
    $to = str_replace(' ', '%', $to);

		// Make a request to the Geocoding API
		$url = "https://api.geoapify.com/v1/geocode/search?text=".$from."&apiKey=89d44b63a4584a80804f363833b525eb";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$geocode = json_decode($response, true);
    $from_lat = $geocode['features']['0']['geometry']['coordinates'][0];
    $from_long = $geocode['features']['0']['geometry']['coordinates'][1];




    $url = "https://api.geoapify.com/v1/geocode/search?text=".$to."&apiKey=89d44b63a4584a80804f363833b525eb";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$geocode = json_decode($response, true);
    $to_lat = $geocode['features']['0']['geometry']['coordinates'][0];
    $to_long = $geocode['features']['0']['geometry']['coordinates'][1];


?>