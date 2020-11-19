<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JBController extends CI_Controller {

	public function __construct(){
		
        parent::__construct();

		$this->load->model("Employers");
		$this->load->model("Fields");
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
}
