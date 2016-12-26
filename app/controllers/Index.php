<?php 

class Index extends DController{
	public function __construct(){
		parent:: __construct();
	}

	public function Index(){
		$this->home();
	}

	public function home(){
		$data = array();
		$tablePost = "post";
		$tableCat = "category";

		$postModel = $this->load->model('PostModel');
		$data['apost'] = $postModel->allPost($tablePost); 

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableCat); 

		$this->load->view('header');
		$this->load->view('search',$data);
  
		$this->load->view('content',$data);  
		$data['latestpost'] = $postModel->sidebrPost($tablePost); 
 

		$this->load->view('sidebar',$data);  
		$this->load->view('footer');  
	} 
	public function postDetails($id){ 
		$data = array();
		$tablePost = "post";
		$tableCat = "category";

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableCat); 

		$this->load->view('header'); 
		$this->load->view('search',$data);

		$postModel = $this->load->model('PostModel');
		$data['idpost'] = $postModel->postById($tablePost,$tableCat,$id);  
	    $this->load->view('details',$data); 
 
		$data['latestpost'] = $postModel->sidebrPost($tablePost); 

		$this->load->view('sidebar',$data);  
		$this->load->view('footer');   
	} 
	public function postByCat($id){ 
		$data = array();
		$tablePost = "post";
		$tableCat = "category"; 

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableCat); 
		
		$this->load->view('header'); 
		$this->load->view('search',$data);

		$postModel = $this->load->model('PostModel');
		$data['catpost'] = $postModel->getpostByCat($tablePost,$tableCat,$id);  
	    $this->load->view('archive',$data); 
 

		$data['latestpost'] = $postModel->sidebrPost($tablePost); 

		$this->load->view('sidebar',$data); 
		$this->load->view('footer');   
	} 
	public function search(){
		$data = array();
		$keyword = $_REQUEST['keyword'];
		$categor = $_REQUEST['category'];
		$tablePost = "post";
		$tableCat = "category"; 

		$catmodel = $this->load->model('CatModel');
		$data['cat'] = $catmodel->catlist($tableCat); 
		
		$this->load->view('header'); 
		$this->load->view('search',$data);

		$postModel = $this->load->model('PostModel');
		$data['srchpost'] = $postModel->getpostBySearch($tablePost,$keyword,$categor);  
	    $this->load->view('srchresult',$data); 
 

		$data['latestpost'] = $postModel->sidebrPost($tablePost); 

		$this->load->view('sidebar',$data); 
		$this->load->view('footer');   
	} 
}