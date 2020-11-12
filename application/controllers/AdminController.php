<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function __construct(){
		
        parent::__construct();

		$this->load->model("Sites");
		$this->load->model("Employers");
		$this->load->model("Fields");
        
	}
	
	public function setting()
	{
		$data = array();
		$data['root_menu'] = 'setting';
		$data['sub_menu'] = 'setting';
		$data['view'] = 'admin/pages/setting';

		$this->load->view('admin/layout', $data);
	}

	public function employersImport()
	{
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = 'employers_import';
		$data['view'] = 'admin/pages/employers_import';
		
		$sites = $this->Sites->load();
		$data['sites'] = $sites;

		$this->load->view('admin/layout', $data);
	}

	public function employers()
	{
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = 'employers_manage';
		$data['view'] = 'admin/pages/employers_manage';
		
		$sites = $this->Sites->load();
		$data['sites'] = $sites;

		$this->load->view('admin/layout', $data);
	}

	public function siteEmployers($site_id)
	{
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = 'employers_manage';
		$data['view'] = 'admin/pages/employers_manage';
		
		$sites = $this->Sites->load();
		$data['sites'] = $sites;

		$employers = $this->Employers->load($site_id);
		$data['employers'] = $employers;
		$data['site_id'] = $site_id;

		$this->load->view('admin/layout', $data);
	}

	public function fields()
	{
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'fields';
		$data['sub_menu'] = 'fields';
		$data['view'] = 'admin/pages/fields_manage';
		
		$sites = $this->Sites->load();
		$data['sites'] = $sites;

		$this->load->view('admin/layout', $data);
	}

	public function fieldsEdit($employer_id)
	{
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'fields';
		$data['sub_menu'] = 'fields';
		$data['view'] = 'admin/pages/fields_edit';
		
		$employer = $this->Employers->get($employer_id);
		if(count($employer) > 0){
			$data['employer'] = $employer[0];
		}

		$fields = $this->Fields->load($employer_id);
		if(count($fields) > 0){
			$data['fields'] = $fields;
		}

		$data['employer_id'] = $employer_id;

		$this->load->view('admin/layout', $data);
	}	

	public function employerEdit($id){
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/employer_edit';
		
		$employer = $this->Employers->get($id);
		if(count($employer) > 0){
			$data['employer'] = $employer[0];
		}

		$this->load->view('admin/layout', $data);
	}

	public function siteNew(){
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = 'site_new';
		$data['view'] = 'admin/pages/site_new';
		
		$this->load->view('admin/layout', $data);
	}

	public function siteEdit($id){
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/site_edit';

		$site = $this->Sites->get($id);
		if(count($site) > 0){
			$data['site'] = $site[0];
		}
				
		$this->load->view('admin/layout', $data);
	}

	public function siteList(){
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}
		
		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = 'site_list';
		$data['view'] = 'admin/pages/site_list';
		
		$sites = $this->Sites->load();
		$data['sites'] = $sites;

		$this->load->view('admin/layout', $data);
	}

	public function dashboard(){

		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}

		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/dashboard';
		
		$this->load->view('admin/layout', $data);	
		
	}

	public function login(){
		unset($_SESSION['user_id']);
		$this->load->view('admin/login');
	}

	public function register(){
		$this->load->view('admin/register');
	}

	public function logs(){
		if(!isset($_SESSION['user_id'])){
			redirect('/admin/login');
		}
		
		$data = array();
		$data['root_menu'] = 'logs';
		$data['sub_menu'] = 'log_list';
		$data['view'] = 'admin/pages/log_list';
		
		$this->load->view('admin/layout', $data);
	}
}
