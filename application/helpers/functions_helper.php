<?php
if(!function_exists('call_zapier_webhook')){
    function call_zapier_webhook($webhook_url, $data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
			CURLOPT_URL => $webhook_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			// CURLOPT_POSTFIELDS => array(			
			// 	'first_name' => 'fname','last_name' => 'lname'
			// ),
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				"Cookie: zapidentity=2046030416; zapforeversession=1yrq9cvxjma7oea46s9b0yivkbngo3nq; zapsession=b0rsayn0ecxi5ia9aji6trz7yzq9uyws"
			),
		));

		$response = curl_exec($curl);

        curl_close($curl);
        
        return $response;
    }
}

if(!function_exists('call_teenstreet')){
    function call_teenstreet($data){
        $curl = curl_init();

        curl_setopt_array($curl, array(
			CURLOPT_URL => "https://dashboard.tenstreet.com/post/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>$data,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/xml"
			),
		));

		$response = curl_exec($curl);

        curl_close($curl);
        
        return $response;
    }
}
?>