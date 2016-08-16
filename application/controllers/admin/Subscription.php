<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url'));
         $this->load->Model('Admin');
         $this->load->library('session');
         if($this->session->userdata('a_id')!='1'){
    		redirect('admin/Home/');
    	 }
    }

    public function addSubscription(){
    	    $msg=$this->session->flashdata('msg');
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    			$send = array(
    			'day' => $this->input->post('day'),
    			'ads' => $this->input->post('na'),
    			'prise' => $this->input->post('pi'),
    			'status' => $this->input->post('status')
    			 );
    			$ID=$this->Admin->addSubscription($send);
    			$msg="\"New Subscription successfully added.\"";
                $this->session->set_flashdata('msg', $msg);
                redirect('admin/Subscription/addSubscription'); 
    		}

    		$data = array(
    			'msg'=>$msg,
    		  
    		  'lday'=>'Days Limit :',
    		  'day' => array(
		        'type'  => 'text',
		        'name'  => 'day',
		        'id'    => 'day',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lna'=>'No Of Ads :',
			  'na' => array(
		        'type'  => 'text',
		        'name'  => 'na',
		        'id'    => 'na',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lpi'=>'Prize In $ :',
			  'pi' => array(
		        'type'  => 'text',
		        'name'  => 'pi',
		        'id'    => 'pi',      'value' => '',
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'r1' => array(
		        'name'  => 'status',
		        'value' => 'TRUE',
		        'checked' => TRUE,

		         ),

			  'r2' => array(
		        'name'  => 'status',
		        'value' => 'FALSE',

		         ),

			  'submit' => array(
			  	'id' => 'btn', 'type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Add Subscription',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );

    		$this->mypage('admin/addSubscription',$data);
    }

    public function viewSubscription(){
            $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
            $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
            $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));


			$changed=0;
				$val=0;
			  if ($NpNo!="") {
			  	$val=($NpNo-1)*10;
			  	$result=$this->Admin->getSubscription_forView($search,$val );
			  	
			  	$PpNo=$NpNo-1;
			  	$NpNo+=1;
			   	$changed=1;
			  }
			  if ($PpNo!="" && $changed!=1) {

			  	$val=($PpNo-1)*10;
			  	$result=$this->Admin->getSubscription_forView($search,$val );
			  	$NpNo=$PpNo;
			  	$PpNo-=1;
			  	$changed=1;
			  }
			  if($changed==0 || $NpNo==1)
			  {
			  	$result=$this->Admin->getSubscription_forView($search,$val );
			  	$NpNo=2;
			  }
			  	if (count($result)<10) {
			    	$NpNo=FALSE;
			    }

			    $data = array(
    			'result' => $result ,
    			'msg'=>$this->session->flashdata('msg'),
    			'search'=> array(
    				'id' => 'search',
    				'name'=>'search',
    				'class' => 'form-control', 'value'=> $search,
    				'placeholder'=> 'Search By Category Name......' ),
    			'form_at'=> 'admin/Subscription/viewSubscription',

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
    		
    		$this->mypage('admin/viewSubscription',$data);	
    }

    public function editSubscription(){
    		$msg="";
    		if ($this->input->server('REQUEST_METHOD')=="POST") {
    			$send = array(
    			'day' => $this->input->post('day'),
    			'ads' => $this->input->post('na'),
    			'prise' => $this->input->post('pi'),
    			'status' => $this->input->post('status'),
    			'id' => $this->input->post('id'),
    			 );
    			$this->Admin->editSubscription($send);
    			$msg="\"Subscription Edited successfully.\"";
    			    			$this->session->set_flashdata('msg', $msg);
    			redirect('admin/Subscription/viewSubscription?msg='.$msg);
    		}
    		$cid=$this->input->get('sub_id');
    		echo "hel==".$cid;
    		$getvalue = array('id' =>$cid , );
    		$row= $this->Admin->getSubscription_ByID($getvalue);
    		$row=$row[0];
    		$disable="";
    		if ($row['status']=="FALSE") {
    			$disable="TRUE";
    		}
    		$data = array(
    			'msg'=>$msg,
    		    'hide' => array(
		        'id'    => $row['id'],   
		         ),

    		  'lday'=>'Days Limit :',
    		  'day' => array(
		        'type'  => 'text',
		        'name'  => 'day',
		        'id'    => 'day',      'value' => $row['day'],  
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

    		  'lna'=>'No Of Ads :',
			  'na' => array(
		        'type'  => 'text',
		        'name'  => 'na',
		        'id'    => 'na',      'value' => $row['ads'],  
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'lpi'=>'Prize In $ :',
			  'pi' => array(
		        'type'  => 'text',
		        'name'  => 'pi',
		        'id'    => 'pi',      'value' => $row['prise'],  
		        'onclick' => 'clean()',
		        'onkeypress'=> 'clean()',
		        'class'=>'form-control col-md-7 col-xs-12',
		         ),

			  'r1' => array(
		        'name'  => 'status',
		        'value' => 'TRUE',
		        'checked' => 'TRUE',  
		         ),

			  'r2' => array(
		        'name'  => 'status',
		        'value' => 'FALSE',
		        'checked' => $disable,  
		         ),

			  'submit' => array(
			  	'id' => 'btn', 'type'=>'submit',
			  	'name'=> 'btn',
			  	'value'=> 'Edit Subscription',
			  	'class' => 'btn btn-success',
			  	),
		        
		         );
			$this->mypage('admin/editSubscription',$data);
    }
//------------------------------------------------------------------------------------------------
    public function mypage($sentview,$data){
    	$this->load->view('admin/header/new_header');
    	$this->load->view('admin/header/new_sidemenu');
    	$this->load->view($sentview,$data);
    	$this->load->view('admin/header/new_footer');
    }
}
?>