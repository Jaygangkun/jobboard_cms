<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = 'employers_import';
		$data['view'] = 'admin/pages/employers_import';
		
		$this->load->view('admin/layout', $data);
	}

	public function employers()
	{
		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = 'employers_manage';
		$data['view'] = 'admin/pages/employers_manage';
		
		$this->load->view('admin/layout', $data);
	}

	public function fields()
	{
		$data = array();
		$data['root_menu'] = 'fields';
		$data['sub_menu'] = 'fields';
		$data['view'] = 'admin/pages/fields_manage';
		
		$this->load->view('admin/layout', $data);
	}

	public function fieldsEdit()
	{
		$data = array();
		$data['root_menu'] = 'fields';
		$data['sub_menu'] = 'fields';
		$data['view'] = 'admin/pages/fields_edit';
		
		$this->load->view('admin/layout', $data);
	}	

	public function employerEdit(){
		$data = array();
		$data['root_menu'] = 'employers';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/employer_edit';
		
		$this->load->view('admin/layout', $data);
	}

	public function siteNew(){
		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = 'site_new';
		$data['view'] = 'admin/pages/site_new';
		
		$this->load->view('admin/layout', $data);
	}

	public function siteEdit(){
		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/site_edit';
		
		$this->load->view('admin/layout', $data);
	}

	public function siteList(){
		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = 'site_list';
		$data['view'] = 'admin/pages/site_list';
		
		$this->load->view('admin/layout', $data);
	}

	public function dashboard(){
		$data = array();
		$data['root_menu'] = 'sites';
		$data['sub_menu'] = '';
		$data['view'] = 'admin/pages/dashboard';
		
		$this->load->view('admin/layout', $data);
	}

}
