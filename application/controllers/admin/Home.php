<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url'));
         $this->load->Model('Admin');
         $this->load->library('session');
         //$this->load->Model('Admin');
    }

    public function index(){
    	$msg=$this->session->flashdata('msg');
        if($this->session->userdata('a_id')=='1'){
            $data = array();
            $this->dashboard();
            return;
        }


    	if ($this->input->server('REQUEST_METHOD')=="POST") {
    		$check = array(
    			'user_name' => $this->input->post('lgid'),
    			'user_pass' => $this->input->post('lgpass') );

    		if ($this->Admin->loginCheck($check)==1) {
    			$this->session->set_userdata( array('a_id' => '1'));
    			redirect('admin/Home/dashboard');
    			//$this->dashboard();
    		}
    		
    			$msg ="Your ID or Password do not match.";		
                $this->session->set_flashdata('msg', $msg);
                redirect('admin/Home/index');   	 
    	}
        $data = array('msg' => $msg,
            'uname'=> array('id' => 'lgid',
                'name'=>'lgid',
                'class'=>'form-control','onclick' => 'clean()','onkeypress'=> 'clean()',
                'placeholder'=>'Username',
                'required'=>'' ),
            'pwd'=> array('id' => 'lgpass',
                'name'=>'lgpass',
                'class'=>'form-control','onclick' => 'clean()','onkeypress'=> 'clean()',
                'placeholder'=>'Password',
                'required'=>'' ),
            'submit' => array(
                'id' => 'btn','type'=> 'submit',
                'name'=> 'btn',
                'value'=> 'Submit',
                'class'=> 'btn btn-default submit',
                ),
         );
    	$this->load->view('admin/index',$data);
    	//$this->template('admin/index',array(),$data);
    }


    public function dashboard(){
    	if($this->session->userdata('a_id')=='1'){
    		$data = array();
    		$this->mypage('admin/dashboard',$data);
    	}
    	else{
    		redirect('admin/Home/');
    	}
    }

    public function mypage($sentview,$data){
        $this->load->view('admin/header/new_header');
        $this->load->view('admin/header/new_sidemenu');
        $this->load->view($sentview,$data);
        $this->load->view('admin/header/new_footer');
    }

    public function myView($sentview,$data){               //Expire
    	$this->load->view('admin/header/header');
    	$this->load->view('admin/header/sidebar');
    	$this->load->view($sentview,$data);
    	$this->load->view('admin/header/footer');
    } 

    public function logout(){
    	if($this->session->userdata('a_id')=='1'){
    		$this->session->unset_userdata('ad_id'); 
    		$this->session->sess_destroy();
    	}
    		redirect('admin/Home/index');

    }
    public function template($sentpage,$parts,$data){
    	$data['main_view']['header']='include/header';
		foreach ($parts as $page) {
			$data['main_view'][]= $page;
		}
		$data['main_view']['footer']='include/footer';
		print_r($data);
		$this->load->view($sentpage,$data);
    }
}
?>