<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JBController extends CI_Controller {

	public function __construct(){
		
        parent::__construct();

		$this->load->model("Employers");
		$this->load->model("Fields");
		$this->load->model("Logs");
	}
	
	public function generate($site_id, $employer_url)
	{
		$data = array();
		$data['site_url'] = str_replace('http://', 'https://', base_url());
		$data['site_id'] = $site_id;
		$data['employer_url'] = $employer_url;

		// find employer id
		$employer = $this->Employers->findByURL($site_id, $employer_url);
		
		if(count($employer) > 0){
			$employer = $employer[0];

			$data['employer'] = $employer;
			
			// getting custom fields
			$fields = $this->Fields->load($employer['id']);
			$data['employer_id'] = $employer['id'];
			$data['fields'] = $fields;
		}

		$this->load->view('admin/snippets/jb_generate_code', $data);
	}

	public function callTS(){
		header('Access-Control-Allow-Origin: *');
		$curl = curl_init();

		if(isset($_POST['company_id'])){
			$company_id = $_POST['company_id'];
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

			if(isset($_POST["custom_".$field_var_name])){
				$field_value = $_POST["custom_".$field_var_name];
			}
			else{
				$field_value = '';
			}

			$display_fields .= "<DisplayField>\r\n                <DisplayPrompt>".$field['name']."</DisplayPrompt>\r\n                <DisplayValue>".$field_value."</DisplayValue>\r\n            </DisplayField>\r\n";
			
		}

		$post_data = "<TenstreetData>\r\n    <!--Authentication Node ONLY required for standard POST NOT for SOAP calls. Tenstreet will provide this node of data to you after a vetting & introduction phone call to your organization. -->\r\n    <Authentication>\r\n        <ClientId>".$this->config->item('ts_client_id')."</ClientId>\r\n        <Password>".$this->config->item('ts_password')."</Password>\r\n        <Service>".$this->config->item('ts_service')."</Service>\r\n    </Authentication>\r\n    <Mode>".$this->config->item('ts_mode')."</Mode>\r\n    <Source>".$this->config->item('ts_source')."</Source>\r\n    <CompanyId>".$company_id."</CompanyId>\r\n    <PersonalData>\r\n        <PersonName>\r\n            <GivenName>".$fname."</GivenName>\r\n            <FamilyName>".$lname."</FamilyName>\r\n        </PersonName>\r\n        <PostalAddress>\r\n            <Municipality>".$custom_city."</Municipality>\r\n            <Region>".$custom_state."</Region>\r\n        </PostalAddress>\r\n        <ContactData>\r\n            <InternetEmailAddress>".$email."</InternetEmailAddress>\r\n            <PrimaryPhone>".$custom_phone."</PrimaryPhone>\r\n        </ContactData>\r\n    </PersonalData>\r\n    <ApplicationData>\r\n        <DisplayFields>\r\n            ".$display_fields."        </DisplayFields>\r\n    </ApplicationData>\r\n</TenstreetData>";

		// echo $post_data;

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://dashboard.tenstreet.com/post/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>$post_data,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/xml"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$this->Logs->add('ts', json_encode($_POST), $response);
		echo $response;
	}
}
