<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url'));
         $this->load->Model('Admin');
         $this->load->library('session');
         if($this->session->userdata('a_id')!='1'){
    		redirect('admin/Home/');
    	 }
    }

    public function fileupload($name,$path){
    	 $config['upload_path']     = $path; 
         $config['allowed_types']   = 'gif|jpg|png|ico|jpeg'; 
         $config['overwrite']		= TRUE;
         // $config['max_size']      = 100; 
         // $config['max_width']     = 1024; 
         // $config['max_height']    = 768;  
         $config['file_name']     =$name.'.jpg';
         $this->load->library('upload', $config);
         $this->upload->do_upload('ico');
    }

    public function index(){
    		$msg=$this->session->flashdata('msg');
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    			$send = array(
    			'name' => $this->input->post('name'),
    			'slug' => $this->input->post('slug'),
    			'keyy' => $this->input->post('key')
    			 );
    			 $ID=$this->Admin->addCategory($send);
    			 $this->fileupload($ID,'./images/category/');
    			$msg="\"New Category successfully added.\"";
				$this->session->set_flashdata('msg', $msg);
                redirect('admin/Category/index');  
    		}

    		$data = array(
    			'msg'=>$msg,
    		  'lname'=>'Category Name :',
    		  'name' => array(
		        'type'  => 'text',
		        'name'  => 'name',
		        'id'    => 'name',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lslug'=>'Slug :',
			  'slug' => array(
		        'type'  => 'text',
		        'name'  => 'slug',
		        'id'    => 'slug',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lkey'=>'Keywords :',
			  'key' => array(
		        'type'  => 'text',
		        'name'  => 'key',
		        'id'    => 'key',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lico'=>'Icon :',
			  'ico' => array('name'  => 'data',
		        'id'    => 'ico',
		        'name' => 'ico',
		         ),

			  'submit' => array(
			  	'id' => 'btn', 'type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Add Category',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );

    		$this->mypage('admin/add_category',$data);
    }

    public function mypage($sentview,$data){
    	$this->load->view('admin/header/new_header');
    	$this->load->view('admin/header/new_sidemenu');
    	$this->load->view($sentview,$data);
    	$this->load->view('admin/header/new_footer');
    }

    public function viewCategory(){
            $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
            $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
            $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));


			$changed=0;
				$val=0;
			  if ($NpNo!="") {
			  	$val=($NpNo-1)*10;
			  	$result=$this->Admin->getCategory_forView( $search,$val );
			  	
			  	$PpNo=$NpNo-1;
			  	$NpNo+=1;
			   	$changed=1;
			  }
			  if ($PpNo!="" && $changed!=1) {

			  	$val=($PpNo-1)*10;
			  	$result=$this->Admin->getCategory_forView( $search,$val );
			  	$NpNo=$PpNo;
			  	$PpNo-=1;
			  	$changed=1;
			  }
			  if($changed==0 || $NpNo==1)
			  {
			  	$result=$this->Admin->getCategory_forView( $search,$val );
			  	$NpNo=2;
			  }
			  	if (count($result)<10) {
			    	$NpNo=FALSE;
			    }
			    
			    $data = array(
    			'result' => $result ,
    			'msg'=>  $this->session->flashdata('msg'),
    			'search'=> array(
    				'id' => 'search',
    				'name'=>'search',
    				'class' => 'form-control', 'value'=> $search,
    				'placeholder'=> 'Search By Category Name......' ),
    			'form_at'=> 'admin/Category/viewCategory',

    			'submit' => array(
	    			'type' =>'submit',
				  	'id' => 'btn',
				  	'name'=> 'btn',
				  	'onclick'=> 'check()',
				  	'class' => 'btn btn-default',
				  	'value' => 'Go!'
				  	), 
    			'name'=>$search,
    			'PpNo'=> $PpNo,
    			'NpNo'=> $NpNo,
			  	);
    		
    		$this->mypage('admin/view_category',$data);	
    }

    public function deleteCategory(){
    		$getvalue = array('id' =>preg_replace("/[^0-9]/", "", $this->input->get('cid')) , );
    		$row= $this->Admin->deleteCategory($getvalue);
    		$msg="\"Category Deleted successfully.\"";
    		if (empty($row)) {
    			$msg="\"Category could not deleted. Please Delete it's subcategory first.\"";
    		}
    		$this->session->set_flashdata('msg', $msg);
    		redirect('admin/Category/viewCategory?msg='.$msg);
    }

    public function editCategory(){
    		$msg='Can not edit category';
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    				$getvalue = array('id' =>preg_replace("/[^0-9]/", "", $this->input->post('id')), );
		    		$row= $this->Admin->getCategory_ByID($getvalue);
		    		if (empty($row)) {
		    			$this->session->set_flashdata('msg', $msg);
		    			redirect('admin/Category/viewCategory?msg=Can not edit category.');
		    		}
    			$send = array(
    			'name' => $this->input->post('name'),
    			'slug' => $this->input->post('slug'),
    			'keyy' => $this->input->post('key'),
    			'id'   => preg_replace("/[^0-9]/", "", $this->input->post('id')),
    			 );
    			$this->Admin->editCategory($send);
    			$this->fileupload($send['id'],'./images/category/');
    			$msg="\"Category Edited successfully.\"";
    			$this->session->set_flashdata('msg', $msg);
    			redirect('admin/Category/viewCategory?msg='.$msg);
    		}
    		$getvalue = array('id' =>preg_replace("/[^0-9]/", "", $this->input->get('cid')) , );
    		$row= $this->Admin->getCategory_ByID($getvalue);
    		if (empty($row)) {
    			$this->session->set_flashdata('msg', $msg);
    			redirect('admin/Category/viewCategory?msg=Can not edit category.');
    		}
    		$row=$row[0];
    		$data = array(
    			'msg'=>$msg,
    		  'lname'=>'Category Name :',
				'hide' => array(
		        'name'  => 'id',
		        'id'    => $row['id'],      'value' => $row['id'],
		         ),

    		  'name' => array(
		        'type'  => 'text',
		        'name'  => 'name',
		        'id'    => 'name',      'value' => $row['name'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lslug'=>'Slug :',
			  'slug' => array(
		        'type'  => 'text',
		        'name'  => 'slug',
		        'id'    => 'slug',      'value' => $row['slug'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lkey'=>'Keywords :',
			  'key' => array(
		        'type'  => 'text',
		        'name'  => 'key',
		        'id'    => 'key',      'value' => $row['keyy'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lico'=>'Icon :',
			  'ico' => array('name'  => 'data',
		        'id'    => 'ico',
		        'name' => 'ico',
		         ),

			  'submit' => array(
			  	'id' => 'btn','type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Add Category',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );

    		$this->mypage('admin/edit_category',$data);
    }

    public function addCategory(){
    	$this->index();
    }
//--------------------------------For Subcategory------------------------------------------------------------
    
    public function addSubCategory(){
    		$msg=$this->session->flashdata('msg');
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    			$send = array(
    			'cid' => $this->input->post('selc'),
    			'name' => $this->input->post('name'),
    			'slug' => $this->input->post('slug'),
    			'keyy' => $this->input->post('key')
    			 );
    			$ID=$this->Admin->addSubCategory($send);
    			$msg="\"New Subcategory successfully added.\"";
				$this->session->set_flashdata('msg', $msg);
                redirect('admin/Category/addSubCategory');  
    		}
    		$cid=$this->input->post('selc');
    		$gcid=preg_replace("/[^0-9]/", "", $this->input->get('cid'));
    		if (!empty($gcid)) {
    			$cid=$gcid;
    		}
    		$data = array(
    			'msg'=>$msg,
    		  'lcatn' => 'Select Category :',
    		  'catn' =>array(
    		  	'name' => 'selc',
    		  	'id'  => 'selc',
    		  	'class' => 'form-control', ),
    		  'select' =>  $this->Admin->getAllCategoryNameWithID(),
    		  'selected'=> $cid,
    		  'lname'=>'Category Name :',
    		  'name' => array(
		        'type'  => 'text',
		        'name'  => 'name',
		        'id'    => 'name',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lslug'=>'Slug :',
			  'slug' => array(
		        'type'  => 'text',
		        'name'  => 'slug',
		        'id'    => 'slug',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lkey'=>'Keywords :',
			  'key' => array(
		        'type'  => 'text',
		        'name'  => 'key',
		        'id'    => 'key',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lico'=>'Icon :',
			  'ico' => array('name'  => 'data',
		        'id'    => 'ico',
		        'name' => 'ico',
		         ),

			  'submit' => array(
			  	'id' => 'btn', 'type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Add Subcategory',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );

    		$this->mypage('admin/addSubCategory',$data);
    }

    public function viewSubcategory(){
            $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
            $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
            $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));
                	$msg=$this->session->flashdata('msg');
    		$cid=$this->preg_replace("/[^0-9]/", "", $this->input->get('selc'));
			  $changed=0;
			  $val=0;

			  if ($NpNo!="") {
			  	$val=($NpNo-1)*10;
			  	$result=$this->Admin->getSubCategory_forView($search,$cid,$val );
			  	$PpNo=$NpNo-1;
			  	$NpNo+=1;
			   	$changed=1;
			  }
			  if ($PpNo!="" && $changed!=1) {

			  	$val=($PpNo-1)*10;
			  	$result=$this->Admin->getSubCategory_forView($search,$cid,$val );
			  	$NpNo=$PpNo;
			  	$PpNo-=1;
			  	$changed=1;
			  }
			  if($changed==0 || $NpNo==1)
			  {
			  	$result=$this->Admin->getSubCategory_forView($search,$cid,$val );
			  	$NpNo=2;
			  }

			  	if (count($result)<10) {
			    	$NpNo=FALSE;
			    }
  
			    $data = array(
	    			'result' => $result ,
	    			'msg'=>$msg,
	    			    				'lcatn' => 'Select Category :',
	    		  'catn' =>array(
	    		  	'name' => 'selc',
	    		  	'id'  => 'selc',
	    		  	'onchange'=>'autoSubmit()',
	    		  	'class' => 'form-control col-md-3 col-sm-5 col-xs-12 ', ),
	    		  'select' =>  array('' => '---------All----------', )+ $this->Admin->getAllCategoryNameWithID(),
	    	  	  'selected'=> $cid,
    			'search'=> array(
    				'id' => 'search',
    				'name'=>'search',
    				'class' => 'form-control', 'value'=> $search,
    				'placeholder'=> 'Search By Category Name......' ),
    			'form_at'=> 'admin/Category/viewSubcategory',
    			'submit' => array(
	    			'type' =>'submit',
				  	'id' => 'btn',
				  	'name'=> 'btn',
				  	'onclick'=> 'check()',
				  	'class' => 'btn btn-default',
				  	'value' => 'Go!'
				  	), 
    			'name'=>$search,
    			'PpNo'=> $PpNo,
    			'NpNo'=> $NpNo,
			  	);
    		
    		$this->mypage('admin/viewSubcategory',$data);	
    }

    public function deleteSubcategory(){
    		$getvalue = array('id' =>preg_replace("/[^0-9]/", "", $this->input->get('sid')) , );
    		$row= $this->Admin->deleteSubcategory($getvalue);
    		$msg="\"Subcategory Deleted successfully.\"";
    		if (empty($row)) {
    			$msg="\"Subcategory could not deleted.\"";
    		}
    		$this->session->set_flashdata('msg', $msg);
    		redirect('admin/Category/viewSubcategory?msg='.$msg);
    }

    public function editSubcategory(){
    		$msg="";
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    			$send = array(
    			'name' => $this->input->post('name'),
    			'slug' => $this->input->post('slug'),
    			'keyy' => $this->input->post('key'),
    			'cid' => $this->input->post('selc'),
    			'id'   => preg_replace("/[^0-9]/", "", $this->input->post('id')),
    			 );
    			$this->Admin->editSubcategory($send);
    			$msg="\"Subcategory Edited successfully.\"";
    			$this->session->set_flashdata('msg', $msg);
    			redirect('admin/Category/viewSubcategory?msg='.$msg);
    		}
    		$getvalue = array('id' =>$this->input->get('sid') , );
    		$row= $this->Admin->getSubcategory_ByID($getvalue);
    		$row=$row[0];
    		$data = array(
    			'msg'=>$msg,
    		   'hide' => array(
		        'id'    => $row['id'],   
		         ),

    		  'lcatn' => 'Select Category :',
    		  'catn' =>array(
    		  	'name' => 'selc',
    		  	'id'  => 'selc',
    		  	'class' => 'form-control', ),
    		  'select' =>  $this->Admin->getAllCategoryNameWithID(),
    		  'selected'=> $row['cid'],

    		  'lname'=>'Category Name :',
    		  'name' => array(
		        'type'  => 'text',
		        'name'  => 'name',
		        'id'    => 'name',      'value' => $row['name'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lslug'=>'Slug :',
			  'slug' => array(
		        'type'  => 'text',
		        'name'  => 'slug',
		        'id'    => 'slug',      'value' => $row['slug'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lkey'=>'Keywords :',
			  'key' => array(
		        'type'  => 'text',
		        'name'  => 'key',
		        'id'    => 'key',      'value' => $row['keyy'],
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'submit' => array(
			  	'id' => 'btn','type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Edit Subcategory',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );

    		$this->mypage('admin/editSubcategory',$data);

    }

//--------------------------------------------------------------------------------------------------- 
    public function myView($sentview,$data){
    	$this->load->view('admin/header/header');
    	$this->load->view('admin/header/sidebar');
    	$this->load->view($sentview,$data);
    	$this->load->view('admin/header/footer');
    } 
}
?>