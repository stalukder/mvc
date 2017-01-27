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

		$tableC = "category"; 
		$data = array();
		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableC); 

		$this->load->view('admin/addpost',$data);
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

	public function addNewPost(){	
		if(!($_POST)){
			header("Location: ".BASE_URL."/Admin/addarticle");
		}

		$input = $this->load->validation('Dform');
		$input->post('title')->isEmpty()->length(10,500);
		$input->post('mytext')->isEmpty();
		$input->post('cat')->isEmpty();

		if($input->submit()){
			$tableP = "post";
			$title = $input->value['title'];
			$content = $input->value['mytext'];
			$cat = $input->value['cat'];
			$data = array(
				'title'=> $title,
				'mytext'=> $content, 
				'cat'=> $cat 
				);
			$postModel = $this->load->model('PostModel');
			$rslt = $postModel->InsertPost($tableP, $data); 
			$mdata = array();
			if($rslt){
				$mdata['msg'] = "Successfully Added";
			}else{
				$mdata['msg'] = "Not Added";
			}  
			$url = BASE_URL."/Admin/article?msg=".urlencode(serialize($mdata));
			header("Location: $url");

		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');

			$tableC = "category"; 
			$data = array();

			$catmodel = $this->load->model('CatModel');
			$data['cat'] = $catmodel->catlist($tableC); 

			$data['posterrors'] = $input->errors;

			$this->load->view('admin/addpost',$data);
			$this->load->view('admin/footer');
		}
	}

	public function editPost($id=NULL){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$tablep = "post"; 
		$tableC = "category"; 
		$data = array();
		$postmodel = $this->load->model('PostModel');
		$data['postbyid'] = $postmodel->AdpostById($tablep, $id); 

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableC); 

		$this->load->view('admin/editpost',$data);
		$this->load->view('admin/footer');
	}

	public function updatePost($id=NULL){
		$input = $this->load->validation('Dform');
		$input->post('title');
		$input->post('mytext');
		$input->post('cat');
		$cond = "id=$id";

		$tableP = "post";
		$title = $input->value['title'];
		$content = $input->value['mytext'];
		$cat = $input->value['cat'];
		$data = array(
			'title'=> $title,
			'mytext'=> $content, 
			'cat'=> $cat 
			);
		$postModel = $this->load->model('PostModel');
		$rslt = $postModel->updatedPost($tableP, $data,$cond); 

		$mdata = array(); 
		if($rslt){
			$mdata['msg'] = "Successfully Updated";
		}else{
			$mdata['msg'] = "Not Updated";
		}   
		$url = BASE_URL."/Admin/article?msg=".urlencode(serialize($mdata));
		header("Location: $url"); 
	}
	public function deletePost($id = NULL){
		$mdata = array();
		$table = "post"; 
		$cond = "id=$id";   
		$postModel = $this->load->model('PostModel');
		$rslt = $postModel->postDelete($table, $cond); 
		if($rslt){
			$mdata['msg'] = "Successfully Deleted";
		}else{
			$mdata['msg'] = "Not Deleted";
		}
		$url = BASE_URL."/Admin/article?msg=".urlencode(serialize($mdata));
		header("Location: $url");   
	}

}