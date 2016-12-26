<?php 

class CatModel extends Dmodel{


	public function __construct(){
		parent::__construct();
	}

	public function catlist($table){
		$sql = "SELECT * FROM $table";
		return $this->db->select($sql);
	} 
	public function catbyid($table, $id){
		$sql = "SELECT * FROM $table WHERE id=:id";
		$data = array(":id"=> $id); 
		return $this->db->select($sql,$data);
	} 
	public function catInsert($table, $data){ 
		return $this->db->insert($table, $data);
	} 
	public function catUpdate($table, $data,$cond){ 
		return $this->db->update($table, $data,$cond);
	} 
	public function catDelete($table, $cond){ 
		return $this->db->delete($table, $cond);
	} 


}