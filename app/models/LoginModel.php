<?php 

class LoginModel extends Dmodel{


	public function __construct(){
		parent::__construct();
	}

	public function userControll($table_user,$username,$password){
		$sql = "SELECT * FROM $table_user WHERE username=? AND password=?";
		return $this->db->affectedRows($sql,$username,$password);
	}  

	public function getUserData($table_user,$username,$password){
		$sql = "SELECT * FROM $table_user WHERE username=? AND password=?";
		return $this->db->selectUser($sql,$username,$password);
	}


}