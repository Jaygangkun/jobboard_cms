<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
Class Sites extends CI_Model
{
	public function add($name, $url, $jobboard_url, $api_key){
		$query = "INSERT INTO sites(`name`, `url`, `jobboard_url`, `api_key`) VALUES('".$name."', '".$url."', '".$jobboard_url."', '".$api_key."')";
        $this->db->query($query);
	}

	public function load(){
		$query = "SELECT * FROM sites";
		$query_result = $this->db->query($query)->result_array();
		
		return $query_result;
	}

	public function get($id){
		$query = "SELECT * FROM sites WHERE id='".$id."'";
		$query_result = $this->db->query($query)->result_array();
		
		return $query_result;
	}

	public function update($id, $name, $url, $jobboard_url, $api_key){
		$query = "UPDATE sites SET name='".$name."', url='".$url."', jobboard_url='".$jobboard_url."', api_key='".$api_key."' WHERE id='".$id."'";
        $this->db->query($query);
	}

	public function delete($id){
		$query = "DELETE FROM sites WHERE id='".$id."'";
		$this->db->query($query);
	}
}