<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TSController extends CI_Controller {

	public function __construct(){
		
        parent::__construct();

		$this->load->model("Fields");
		$this->load->model("Logs");
	}
	
	public function callTS(){
		header('Access-Control-Allow-Origin: *');

		if(isset($_POST['ts_id'])){
			$ts_id = $_POST['ts_id'];
		}
		else{
			echo "Company id doens't exist";
			die();
		}

		if(!isset($_POST['employer_id'])){
			echo "Employer id doens't exist";
			die();
		}

		if(isset($_POST['email'])){
			$email = $_POST['email'];
		}
		else{
			$email = '';
		}

		if(isset($_POST['fname'])){
			$fname = $_POST['fname'];
		}
		else{
			$fname = '';
		}

		if(isset($_POST['lname'])){
			$lname = $_POST['lname'];
		}
		else{
			$lname = '';
		}

		if(isset($_POST['custom_phone'])){
			$custom_phone = $_POST['custom_phone'];
		}
		else{
			$custom_phone = '';
		}

		if(isset($_POST['custom_city'])){
			$custom_city = $_POST['custom_city'];
		}
		else{
			$custom_city = '';
		}

		if(isset($_POST['custom_state'])){
			$custom_state = $_POST['custom_state'];
		}
		else{
			$custom_state = '';
		}

		$fields = $this->Fields->load($_POST['employer_id']);
		$display_fields = '';
		foreach($fields as $field){
			if(strtolower($field['name']) == 'state' || strtolower($field['name']) == 'city' || strtolower($field['name']) == 'phone'){
				continue;
			}

			$field_var_name = str_replace(' ', '_', strtolower($field['name']));
			$field_var_name = str_replace('?', '', $field_var_name);

			if(isset($_POST["custom_".$field_var_name])){
				$field_value = $_POST["custom_".$field_var_name];
			}
			else{
				$field_value = '';
			}

			$display_fields .= "<DisplayField>\r\n                <DisplayPrompt>".$field['name']."</DisplayPrompt>\r\n                <DisplayValue>".$field_value."</DisplayValue>\r\n            </DisplayField>\r\n";
			
		}

		$ts_post_data = "<TenstreetData>\r\n    <!--Authentication Node ONLY required for standard POST NOT for SOAP calls. Tenstreet will provide this node of data to you after a vetting & introduction phone call to your organization. -->\r\n    <Authentication>\r\n        <ClientId>".$this->config->item('ts_client_id')."</ClientId>\r\n        <Password>".$this->config->item('ts_password')."</Password>\r\n        <Service>".$this->config->item('ts_service')."</Service>\r\n    </Authentication>\r\n    <Mode>".$this->config->item('ts_mode')."</Mode>\r\n    <Source>".$this->config->item('ts_source')."</Source>\r\n    <CompanyId>".$ts_id."</CompanyId>\r\n    <PersonalData>\r\n        <PersonName>\r\n            <GivenName>".$fname."</GivenName>\r\n            <FamilyName>".$lname."</FamilyName>\r\n        </PersonName>\r\n        <PostalAddress>\r\n            <Municipality>".$custom_city."</Municipality>\r\n            <Region>".$custom_state."</Region>\r\n        </PostalAddress>\r\n        <ContactData>\r\n            <InternetEmailAddress>".$email."</InternetEmailAddress>\r\n            <PrimaryPhone>".$custom_phone."</PrimaryPhone>\r\n        </ContactData>\r\n    </PersonalData>\r\n    <ApplicationData>\r\n        <DisplayFields>\r\n            ".$display_fields."        </DisplayFields>\r\n    </ApplicationData>\r\n</TenstreetData>";

		// calling teenstreet
		$ts_response = call_teenstreet($ts_post_data);

		$this->Logs->add('ts', json_encode($_POST), $ts_response);
		echo $ts_response;
	}
}
