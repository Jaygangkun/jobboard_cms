<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZapierController extends CI_Controller {

	public function __construct(){
		
        parent::__construct();

		$this->load->model("Employers");
		$this->load->model("Fields");
	}
	
	public function doTest()
	{
		if(!isset($_POST['id'])){
			echo json_encode(array(
				'success' => false,
				"message" => "No Employer ID"
			));
			die();
		}

		$employers = $this->Employers->get($_POST['id']);
		if(count($employers) == 0){
			echo json_encode(array(
				'success' => false,
				"message" => "Not Found Employer"
			));
			die();
		}

		$employer = $employers[0];

		if($employer['zapier_webhook_url'] == null){
			echo json_encode(array(
				'success' => false,
				"message" => "Not Found Zapier Webhook URL"
			));
			die();
		}

		$curl = curl_init();

		$fields = $this->Fields->load($employer['id']);
		$zapier_test_data = array();
		$zapier_test_data['fname'] = 'First Name Field Test Data';
		$zapier_test_data['lname'] = 'Last Name Field Test Data';
		$zapier_test_data['email'] = 'Email Field Test Data';

		foreach($fields as $field){
			$field_name = $field['name'];
			$field_var_name = str_replace(' ', '_', strtolower($field['name']));
			$field_var_name = str_replace('?', '', $field_var_name);

			if($field['zapier_data_name'] != null && $field['zapier_data_name'] != ''){
				$zapier_data_name = $field['zapier_data_name'];	
			}
			else{
				$zapier_data_name = $field_var_name;
				continue;
			}
			
			$zapier_test_data[$zapier_data_name] = $field['name']." Field Test Data";
		}

		curl_setopt_array($curl, array(
			CURLOPT_URL => $employer['zapier_webhook_url'],
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
			CURLOPT_POSTFIELDS => $zapier_test_data,
			CURLOPT_HTTPHEADER => array(
				"Cookie: zapidentity=2046030416; zapforeversession=1yrq9cvxjma7oea46s9b0yivkbngo3nq; zapsession=b0rsayn0ecxi5ia9aji6trz7yzq9uyws"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response, true);

		if($response['status'] == 'success'){
			echo json_encode(array(
				'success' => true,
				"message" => "Successfully Zapier Webhook Test",
				"response" => $response
			));
		}
		else{
			echo json_encode(array(
				'success' => false,
				"message" => "Fail Zapier Webhook Test",
				"response" => $response
			));
		}
		
	}
}
