<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
Class Fields extends CI_Model
{
	public function add($employer_id, $name, $required){
		$query = "INSERT INTO fields(`employer_id`, `name`, `required`) VALUES('".$employer_id."', '".$name."', '".$required."')";
		$this->db->query($query);
		return $this->db->insert_id();
	}

	public function load($employer_id){
		$query = "SELECT * FROM fields WHERE employer_id='".$employer_id."'";
		$query_result = $this->db->query($query)->result_array();
		
		return $query_result;
	}

	public function update($id, $employer_id, $name, $required){
		$query = "UPDATE fields SET employer_id='".$employer_id."', name='".$name."', required='".$required."' WHERE id='".$id."'";
        $this->db->query($query);
	}

	public function delete($id){
		$query = "DELETE  FROM fields WHERE id='".$id."'";
        $this->db->query($query);
	}
}