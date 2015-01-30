<?php
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_user($facebookId){
		$query = $this->db->get_where('user', 
				array('facebook_id' => $facebookId));
		return $query->row_array();
	}
	
	function save_user($data){
		$this->db->insert('user', $data);
		$this->db->insert('rol_user', $data);
		$this->db->insert('activity', $data);
	}
	
	function update_user($data){
		$this->db->update('user', $data);
		$this->db->insert('activity', $data);
	}
	
	function validate_token($token){
		$tokens = $this->db->get('token')->row_array();
		$md5 = md5($token);
		foreach ($tokens as $t ){
		 	if($md5 == $t){
		 		return true;
		 	}
		}
		return false;
	}
}