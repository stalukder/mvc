<?php 

class Dform{
	public $currentvalue;
	public $value = array();
	public $errors = array();

	function __construct(){

	}

	public function post($key){
		$this->value[$key] = trim($_POST[$key]);
		$this->currentvalue = $key;
		return $this;
	}

	public function isEmpty(){
		if(empty($this->value[$this->currentvalue])){
			$this->errors[$this->currentvalue]['empty'] = "Field Must not be empty";
		}
		return $this;
	}

	public function length($min=0,$max){
		if(strlen($this->value[$this->currentvalue]) < $min OR strlen($this->value[$this->currentvalue]) > $max ){
			$this->errors[$this->currentvalue]['length'] = "Should Min {$min} And Max {$max} Characters";
		}
		return $this;
	}

	public function submit(){
		if(empty($this->errors)){
			return true;
		}else{
			return false;
		}
	}
}