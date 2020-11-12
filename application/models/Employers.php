<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
Class Employers extends CI_Model
{
	public function add($data){
		$query = "INSERT INTO employers(`site_id`, `employer_id`, `name`, `url`, `website`, `logo`, `email`, `phone`, `address`, `city`, `state`, `zip`, `country`, `location`, `hidden`, `approved`, `active_jobs_count`, `created_at`) VALUES('".$this->db->escape_str($data['site_id'])."', '".$this->db->escape_str($data['employer_id'])."', '".$this->db->escape_str($data['name'])."', '".$this->db->escape_str($data['url'])."', '".$this->db->escape_str($data['website'])."', '".$this->db->escape_str($data['logo'])."', '".$this->db->escape_str($data['email'])."', '".$this->db->escape_str($data['phone'])."', '".$this->db->escape_str($data['address'])."', '".$this->db->escape_str($data['city'])."', '".$this->db->escape_str($data['state'])."', '".$this->db->escape_str($data['zip'])."', '".$this->db->escape_str($data['country'])."', '".$this->db->escape_str($data['location'])."', '".$this->db->escape_str($data['hidden'])."', '".$this->db->escape_str($data['approved'])."', '".$this->db->escape_str($data['active_jobs_count'])."', '".$this->db->escape_str($data['created_at'])."')";
        $this->db->query($query);
	}

	public function checkExist($site_id, $employer_id){
		$query = "SELECT * FROM employers WHERE site_id='".$site_id."' AND employer_id='".$employer_id."'";
		$query_result = $this->db->query($query)->result_array();
		
		if(count($query_result) > 0){
			return true;
		}

		return false;
	}

	public function update($site_id, $employer_id, $data){
		$query = "UPDATE employers SET `name`='".$this->db->escape_str($data['name'])."', `url`='".$this->db->escape_str($data['url'])."', `website`='".$this->db->escape_str($data['website'])."', `logo`='".$this->db->escape_str($data['logo'])."', `email`='".$this->db->escape_str($data['email'])."', `phone`='".$this->db->escape_str($data['phone'])."', `address`='".$this->db->escape_str($data['address'])."', `city`='".$this->db->escape_str($data['city'])."', `state`='".$this->db->escape_str($data['state'])."', `zip`='".$this->db->escape_str($data['zip'])."', `country`='".$this->db->escape_str($data['country'])."', `location`='".$this->db->escape_str($data['location'])."', `hidden`='".$this->db->escape_str($data['hidden'])."', `approved`='".$this->db->escape_str($data['approved'])."', `active_jobs_count`='".$this->db->escape_str($data['active_jobs_count'])."', `created_at`='".$this->db->escape_str($data['created_at'])."' WHERE site_id='".$site_id."' AND employer_id='".$employer_id."'";

		$this->db->query($query);
	}

	public function load($site_id){
		$query = "SELECT * FROM employers WHERE site_id='".$site_id."'";
		$query_result = $this->db->query($query)->result_array();

		return $query_result;
	}

	public function get($id){
		$query = "SELECT * FROM employers WHERE id='".$id."'";
		$query_result = $this->db->query($query)->result_array();

		return $query_result;
	}

	public function updateTS($id, $ts_integrate, $ts_id){
		$query = "UPDATE employers SET `ts_integrate`='".$this->db->escape_str($ts_integrate)."', `ts_id`='".$this->db->escape_str($ts_id)."' WHERE id='".$id."'";

		$this->db->query($query);
	}

	public function findByURL($site_id, $url){
		$query = "SELECT * FROM employers WHERE `site_id`='".$site_id."' AND `url` LIKE '%".$url."'";
		
		$query_result = $this->db->query($query)->result_array();

		return $query_result;
	}

	public function delete($id){
		$query = "DELETE  FROM employers WHERE id='".$id."'";
        $this->db->query($query);
	}
}