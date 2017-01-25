	<?php 

class Load{
	public function __construct(){

	}

	public function view($fnm, $data = NULL){
		if($data==true){
			extract($data);
		}
		include "app/views/".$fnm.".php"; 
	}
	public function model($fnm){
		include "app/models/".$fnm.".php"; 
		return new $fnm();
	}
	public function validation($fnm){
		include "app/validations/".$fnm.".php"; 
		return new $fnm();
	}
}