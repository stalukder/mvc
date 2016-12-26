<?php 

class Sajib extends DController{
	public function __construct(){
		//parent::__construct();
	}

	public function talukder($age){
		echo "This is talukder method. Age is {$age}";
	}
}