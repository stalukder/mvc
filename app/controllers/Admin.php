<?php 

class Admin extends DController{
	public function __construct(){
		parent:: __construct();
		Session::checkSession();
	}

	public function Index(){
		$this->home();
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function home(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	} 
	public function addCategory(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory');
		$this->load->view('admin/footer');
	}
 	public function category(){ 
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$table = "category";
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($table);  
		$this->load->view('admin/category',$data); 
		$this->load->view('admin/footer');
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
		$mdata = array();
		if($rslt){
			$mdata['msg'] = "Successfully Added";
		}else{
			$mdata['msg'] = "Not Added";
		}  
		$url = BASE_URL."/Admin/category?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}
	public function editCat($id = NULL){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data = array();
		$table = "category"; 
		$catmodel = $this->load->model('CatModel');
		$data['catbyid'] = $catmodel->catbyid($table, $id);  
		$this->load->view('admin/editcategory',$data);  
		$this->load->view('admin/footer');
	}

	public function updatCategory($id=NULL){
		$table = "category";  
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
			$mdata['msg'] = "Successfully Updated";
		}else{
			$mdata['msg'] = "Not Updated";
		}   
		$url = BASE_URL."/Admin/category?msg=".urlencode(serialize($mdata));
		header("Location: $url"); 
	}
	public function deleteCat($id = NULL){
		$mdata = array();
		$table = "category"; 
		$cond = "id=$id";   
		$catmodel = $this->load->model('CatModel');
		$rslt = $catmodel->catDelete($table, $cond); 
		if($rslt){
			$mdata['msg'] = "Successfully Deleted";
		}else{
			$mdata['msg'] = "Not Deleted";
		}
		$url = BASE_URL."/Admin/category?msg=".urlencode(serialize($mdata));
		header("Location: $url");   
	}

	public function addarticle(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addpost');
		$this->load->view('admin/footer');
	}
	public function article(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar'); 
 
		$tableP = "post";
		$tableC = "category"; 
		$data = array();
		$postmodel = $this->load->model('PostMOdel');
		$data['alpost'] = $postmodel->allPost($tableP);
 
		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableC); 

		$this->load->view('admin/postlist',$data); 
		$this->load->view('admin/footer');		
	}

}