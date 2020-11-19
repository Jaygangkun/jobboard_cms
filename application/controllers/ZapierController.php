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

		$fields = $this->Fields->load($employer['id']);
		$zapier_data = array();
		$zapier_data['fname'] = 'First Name Field Test Data';
		$zapier_data['lname'] = 'Last Name Field Test Data';
		$zapier_data['email'] = 'Email Field Test Data';

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
			
			$zapier_data[$zapier_data_name] = $field['name']." Field Test Data";
		}

		$response = call_zapier_webhook($employer['zapier_webhook_url'], $zapier_data);

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

	public function callZapier(){
		header('Access-Control-Allow-Origin: *');
		
		if(!isset($_POST['employer_id'])){
			echo json_encode(array(
				'success' => false,
				"message" => "No Employer ID"
			));
			die();
		}

		$employers = $this->Employers->get($_POST['employer_id']);
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

		$fields = $this->Fields->load($employer['id']);
		$zapier_data = array();

		if(isset($_POST['fname'])){
			$zapier_data['fname'] = $_POST['fname'];
		}
		else{
			$zapier_data['fname'] = '';
		}

		if(isset($_POST['lname'])){
			$zapier_data['lname'] = $_POST['lname'];
		}
		else{
			$zapier_data['lname'] = '';
		}

		if(isset($_POST['email'])){
			$zapier_data['email'] = $_POST['email'];
		}
		else{
			$zapier_data['email'] = '';
		}

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
			
			if(isset($_POST['custom_'.$field_var_name])){
				$zapier_data[$zapier_data_name] = $_POST['custom_'.$field_var_name];	
			}
		}

		$response = call_zapier_webhook($employer['zapier_webhook_url'], $zapier_data);

		$response = json_decode($response, true);

		if($response['status'] == 'success'){
			echo json_encode(array(
				'success' => true,
				"message" => "Successed Zapier Webhook Request",
				"response" => $response
			));
		}
		else{
			echo json_encode(array(
				'success' => false,
				"message" => "Failed Zapier Webhook Request",
				"response" => $response
			));
		}	
	}
}
