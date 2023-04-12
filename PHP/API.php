<?php

    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://thingsboard.cloud/api/auth/login");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('username' => 'mmaswin22@gmail.com', 'password' => 'Karadi2263')));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        $response = json_decode($response);
        $jwt_token = $response->token;

        echo $jwt_token;
    }
    
    curl_close($ch);
    
    
      
?>