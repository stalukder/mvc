<?php 

class Category extends DController{
	public function __construct(){
		parent:: __construct();
	}
 
	public function category(){ 
		$table = "category";
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($table);  
		$this->load->view('category',$data); 
	}
	public function catById(){ 
		$table = "category";
		$id = 2;
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['catbyid'] = $catmodel->catbyid($table, $id);  
		$this->load->view('catbyid',$data); 
	}
	public function addCategory(){
		$this->load->view('addcategory'); 
	}
	public function updateCategory(){
		$table = "category";
		$id = 3;
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['catbyid'] = $catmodel->catbyid($table, $id);  
		$this->load->view('updatecategory',$data); 
	}
	public function insertCategory(){
		$table = "category"; 
		$title = $_POST['title'];
		$catName = $_POST['catName'];
		$data = array(
			'title'=> $title,
			'catName'=> $catName 
			);
		$catmodel = $this->load->model('CatModel');
		$rslt = $catmodel->catInsert($table, $data); 
		if($rslt){
			$data['msg'] = "Successfully Added";
		}else{
			$data['msg'] = "Not Added";
		}
		$this->load->view('addcategory',$data);   
	}
	public function updatCategory(){
		$table = "category"; 
		$id = $_POST['id'];
		$title = $_POST['title'];
		$catName = $_POST['catName'];
		$cond = "id=$id"; 
		$data = array(
			'title'=> $title,
			'catName'=> $catName
			);
		$catmodel = $this->load->model('CatModel');
		$rslt = $catmodel->catUpdate($table, $data,$cond);
		$mdata = array(); 
		if($rslt){
			$mdata['msg'] = "Successfully Added";
		}else{
			$mdata['msg'] = "Not Added";
		}
		$this->load->view('updatecategory',$mdata);   
	}
	public function deleteCat(){
		$table = "category"; 
		$cond = "id=5";   
		$catmodel = $this->load->model('CatModel');
		$rslt = $catmodel->catDelete($table, $cond); 
		if($rslt){
			$data['msg'] = "Successfully Added";
		}else{
			$data['msg'] = "Not Added";
		}
		$this->load->view('updatecategory',$data);   
	}
}