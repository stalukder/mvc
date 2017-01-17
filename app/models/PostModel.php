<?php 

class PostModel extends Dmodel{


	public function __construct(){
		parent::__construct();
	}

	public function allPost($table ){
		$sql = "SELECT * FROM $table ORDER BY ID DESC ";
		return $this->db->select($sql);
	}  
	
	public function postById($table,$cat,$id){
		$sql = "SELECT $table.*,$cat.catName FROM $table
				INNER JOIN $cat
				ON $table.cat = $cat.id
				WHERE $table.id = $id ";
		return $this->db->select($sql);
	}
	public function getpostByCat($table,$cat,$id){
		$sql = "SELECT $table.*,$cat.catName FROM $table
				INNER JOIN $cat 
				ON $table.cat = $cat.id 
				WHERE $cat.id = $id  ORDER BY ID DESC ";
		return $this->db->select($sql);
	}

	public function sidebrPost($table){
		$sql = "SELECT * FROM $table ORDER BY ID DESC LIMIT 5";
		return $this->db->select($sql);
	}  

	public function getpostBySearch($tablePost,$keyword,$categor){
		$sql = "";
		if(empty($keyword) && $categor==0){
			header("Location: ".BASE_URL."/Index/home/");
		}
		if(isset($keyword) && !empty($keyword)){//if keyword set goes here
		   $sql .= "SELECT * FROM $tablePost WHERE title LIKE '%$keyword%' OR mytext LIKE '%$keyword%'";
		   if(isset($categor) &&  $categor!=0){
		     $sql .= "AND cat=$categor";
		   } 
		}else if (isset($categor)){ //if keyword not set but category set then goes here
		  $sql .= "SELECT * FROM $tablePost WHERE cat=$categor"; 
		}  
		return $this->db->select($sql);
	}
}