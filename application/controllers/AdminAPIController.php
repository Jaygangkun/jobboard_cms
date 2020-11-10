<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAPIController extends CI_Controller {

    public function __construct(){
		
        parent::__construct();

        $this->load->model("Sites");
        $this->load->model("Employers");
        $this->load->model("Fields");
    }
    
	public function siteNew()
	{
		$this->Sites->add($_POST['name'], $_POST['url'], $_POST['jobboard_url'], $_POST['api_key']);
    }
    
    public function siteUpdate()
	{
		$this->Sites->update($_POST['id'], $_POST['name'], $_POST['url'], $_POST['jobboard_url'], $_POST['api_key']);
    }
    
    public function siteDelete()
	{
		$this->Sites->delete($_POST['id']);
    }
    
    public function employersImport(){
        if(isset($_POST['site_id'])){
            $site = $this->Sites->get($_POST['site_id']);
            if(count($site) > 0){
                $site = $site[0];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => $site['jobboard_url']."api/v1/employers",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "X-Api-Key: ".$site['api_key'],
                    // "Cookie: __cfduid=dd424f6c25b16c61e202cb06c803eb8171603134116"
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
            }
        }
    }

    public function employersImportSave()
	{
        $employers = $_POST['employers'];
        
        for($index = 0; $index < count($employers); $index++){
            if(!$this->Employers->checkExist($_POST['site_id'], $employers[$index]['employer_id'])){
                $this->Employers->add(array(
                    'site_id' => $_POST['site_id'],
                    'employer_id' => $employers[$index]['employer_id'],
                    'name' => $employers[$index]['name'],
                    'url' => $employers[$index]['url'],
                    'website' => $employers[$index]['website'],
                    'logo' => $employers[$index]['logo'],
                    'email' => $employers[$index]['email'],
                    'phone' => $employers[$index]['phone'],
                    'address' => $employers[$index]['address'],
                    'city' => $employers[$index]['city'],
                    'state' => $employers[$index]['state'],
                    'zip' => $employers[$index]['zip'],
                    'country' => $employers[$index]['country'],
                    'location' => $employers[$index]['location'],
                    'hidden' => $employers[$index]['hidden'],
                    'approved' => $employers[$index]['approved'],
                    'active_jobs_count' => $employers[$index]['active_jobs_count'],
                    'created_at' => $employers[$index]['created_at']    
                ));
            }
            else{
                $this->Employers->update($_POST['site_id'], $employers[$index]['employer_id'], array(
                    'name' => $employers[$index]['name'],
                    'url' => $employers[$index]['url'],
                    'website' => $employers[$index]['website'],
                    'logo' => $employers[$index]['logo'],
                    'email' => $employers[$index]['email'],
                    'phone' => $employers[$index]['phone'],
                    'address' => $employers[$index]['address'],
                    'city' => $employers[$index]['city'],
                    'state' => $employers[$index]['state'],
                    'zip' => $employers[$index]['zip'],
                    'country' => $employers[$index]['country'],
                    'location' => $employers[$index]['location'],
                    'hidden' => $employers[$index]['hidden'],
                    'approved' => $employers[$index]['approved'],
                    'active_jobs_count' => $employers[$index]['active_jobs_count'],
                    'created_at' => $employers[$index]['created_at']    
                ));
            }
        }
    }
    
    public function employersLoad(){
        $employers = $this->Employers->load($_POST['site_id']);
        echo json_encode($employers);
    }

    public function employerUpdate(){
        $employers = $this->Employers->updateTS($_POST['id'], $_POST['ts_integrate'], $_POST['ts_id']);
    }

    public function fieldAdd(){
        $id = $this->Fields->add($_POST['employer_id'], $_POST['name'], $_POST['required']);
        echo json_encode(array(
            'name' => $_POST['name'],
            'required' => $_POST['required'],
            'db_id' => $id
        ));
    }

    public function fieldUpdate(){
        $id = $this->Fields->update($_POST['db_id'], $_POST['employer_id'], $_POST['name'], $_POST['required']);
    }

    public function fieldDelete(){
        $id = $this->Fields->delete($_POST['id']);
    }

    public function employersFieldsLoad(){
        $employers = $this->Employers->load($_POST['site_id']);
        $response = array();
        foreach($employers as $employer){
            $employer_data = $employer;
            $employer_data['fields'] = $this->Fields->load($employer['id']);
            $response[] = $employer_data;
        }

        echo json_encode($response);
    }

    public function jobboardIntegrateCode()
	{
        $data = array();

        $data['site_url'] = str_replace('http://', 'https://', base_url());
        $data['site_id'] = $_POST['site_id'];
        
        $this->load->view('admin/snippets/jb_integrate_code', $data);
	}
}
