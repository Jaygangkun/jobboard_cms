<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
Class Logs extends CI_Model
{
	
	public function add($type, $request, $response){
		$query = "INSERT INTO logs(`type`, `request`, `response`) VALUES('".$type."', '".$request."', '".$response."')";
		$this->db->query($query);
	}

	public function load($type){
		$query = "SELECT * FROM logs WHERE type='".$type."'";
		$query_result = $this->db->query($query)->result_array();
		
		return $query_result;
	}
}