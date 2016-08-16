<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wel extends CI_Controller {

	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
         $this->fileupload();
    }

    public function fileupload(){
    	$config['upload_path']    = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function main(){
    	$this->load->helper('url');
		$this->load->view('main');
	}
	public function mypage()
	{
		//$data['my_value']="Some value";
		$aa = array('Name' => 'Ashish','S_bane'=>'Dwivedi' );
		$data['aa']=$aa;

		$this->load->database(); 

		$query = $this->db->query("SELECT * FROM user WHERE id=23");
      //  $query = $this->db->get();
		//$query = $this->db->get_where("user",array("id"=>1,"pwd"=>'ash')); 
		$data['records'] = $query->result_array();

		$this->load->view('mypage',$data);
	}

	public function signup(){
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('form');
	}

	public function saveFile(){
		if ( ! $this->upload->do_upload('userfile')) {
            $data = array('error' => $this->upload->display_errors(),'add'=> $this->input->server('REQUEST_METHOD')); 
           
            $this->load->view('mypage', $data); 
         }
			
         else { 
            $data = array('error' => $this->upload->data(), 'add'=> $this->input->server('REQUEST_METHOD')); 
            $this->load->view('mypage', $data); 
         } 
	}

	public function newHome(){
		$data['main_view'][]='include/header';
		$data['main_view'][]='include/images_view.php';
		$data['main_view'][]='include/footer';
		$this->load->view('index',$data);
	}

	
}
