<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADmanagement extends CI_Controller {

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
         $config['overwrite']       = TRUE;
         // $config['max_size']      = 100; 
         // $config['max_width']     = 1024; 
         // $config['max_height']    = 768;  
         $config['file_name']     =$name.'.jpg';
         $this->load->library('upload', $config);
         $this->upload->do_upload('ico');
    }
  
    public function addAD(){
      $msg=$this->session->flashdata('msg');
            if ($this->input->server('REQUEST_METHOD')=="POST") {
                $send = array(
                'sid' => $this->input->post('selc1'),
                'head' => $this->input->post('head'),
                'content' => $this->input->post('content'),
                'contact' => $this->input->post('contact'),
                'cost' => $this->input->post('cost'),

                'status' => '1',
                'edt' =>'TRUE',
                 );
                $ID=$this->Admin->addAD($send);
                $this->fileupload($ID,'./images/ad/');
                $msg="\"New AD successfully added.\"";
                $this->session->set_flashdata('msg', $msg);
                redirect('admin/ADmanagement/addAD');   
                           }
            $cid=preg_replace("/[^0-9]/", "", $this->input->get('cid'));
            $select=$this->Admin->getAllCategoryNameWithID();
            if (empty($cid) || empty($select[$cid])) {
              echo "from_1";
                $cid=key($select);
            }
            $data = array(
                'msg'=>$msg,
              'lcatn' => 'Select Category :',
              'catn' =>array(
                'name' => 'selc',
                'id'  => 'selc',
                'onchange'=> 'findSubCategory()',
                'class' => 'form-control', ),
              'select' =>  $select,
              'selected'=> $cid,

              'lcatn1' => 'Select Category :',
              'catn1' =>array(
                'name' => 'selc1',
                'id'  => 'selc1',
                'class' => 'form-control', ),
              'select1' =>  $this->Admin->getAllSubcategoryNameWithID_of_cid($cid),
              'selected1'=> '',

              'lhead'=>'Head :',
              'head' => array(
                'type'  => 'text',
                'name'  => 'head',
                'id'    => 'head',      'value' => '',
                'onclick' => 'clean()',
                'onkeypress'=> 'clean()',
                'class'=>'form-control col-md-7 col-xs-12',
                 ),

              'lcontent'=>'Content :',
              'content' => array(
                'type'  => 'text',
                'name'  => 'content',
                'id'    => 'content',      'value' => '',
                'onclick' => 'clean()',
                'onkeypress'=> 'clean()',
                'class'=>'form-control col-md-7 col-xs-12',
                 ),

              'lcontact'=>'Contact :',
              'contact' => array(
                'type'  => 'text',
                'name'  => 'contact',
                'id'    => 'contact',      'value' => '',
                'onclick' => 'clean()',
                'onkeypress'=> 'clean()',
                'class'=>'form-control col-md-7 col-xs-12',
                 ),

              'lcost'=>'Cost :',
              'cost' => array(
                'type'  => 'text',
                'name'  => 'cost',
                'id'    => 'cost',      'value' => '',
                'onclick' => 'clean()',
                'onkeypress'=> 'clean()',
                'class'=>'form-control col-md-7 col-xs-12',
                 ),

              'lico'=>'Icon :',
              'ico' => array('name'  => 'data',
                'id'    => 'img',
                'name' => 'ico',
                 ),

              'submit' => array(
                'id' => 'btn','type'=>'submit',
                'name'=> 'btn',
                'value'=> 'Add AD',
                'class' => 'btn btn-success',
                ),
                
                 );

            $this->mypage('admin/addAD',$data);
    }

    public function viewAD(){
            $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
            $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
            $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));
            $cid=preg_replace("/[^0-9]/", "",  $this->input->get('selc'));
            $sid=preg_replace("/[^0-9]/", "",  $this->input->get('sels'));
            $changed=0;
                $val=0;
              if ($NpNo!="") {
                $val=($NpNo-1)*10;
                $result=$this->Admin->getADs_forView($search,$val,$cid,$sid );
                
                $PpNo=$NpNo-1;
                $NpNo+=1;
                $changed=1;
              }
              if ($PpNo!="" && $changed!=1) {

                $val=($PpNo-1)*10;
                $result=$this->Admin->getADs_forView($search,$val,$cid,$sid );
                $NpNo=$PpNo;
                $PpNo-=1;
                $changed=1;
              }
              if($changed==0 || $NpNo==1)
              {
                $result=$this->Admin->getADs_forView($search,$val,$cid,$sid );
                $NpNo=2;
              }
                if (count($result)<10) {
                    $NpNo=FALSE;
                }

            $select=$this->Admin->getAllCategoryNameWithID();

                $data = array(
                'result' => $result ,
                'msg'=>preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('msg')),
                'search'=> array(
                    'id' => 'search',
                    'name'=>'search',
                    'class' => 'form-control', 'value'=> $search,
                    'placeholder'=> 'Search By Category Name......' ),
                'form_at'=> 'admin/ADmanagement/viewAD',

                'catn' =>array(
                'name' => 'selc',
                'id'  => 'selc',
                'onchange'=> 'autoSubmit()',
                'class' => 'col-md-6 col-sm-6 col-xs-12 form-control ', ),
                'select' =>  array('' => '---------All----------', )+ $select,
                'selected'=> $cid,

                'catn1' =>array(
                'name' => 'sels',
                'id'  => 'sels',
                'onchange'=> 'autoSubmit()',
                'class' => 'col-xs-6 col-md-4 form-control', ),
                'select1' =>  array('' => '---------All----------', )+ $this->Admin->getAllSubcategoryNameWithID_of_cid($cid),
                'selected1'=> $sid,

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
            
            $this->mypage('admin/viewAD',$data);    
    }

    public function status_oper(){
        $disable=$sid=preg_replace("/[^0-9]/", "", $this->input->get('disable'));
        $enable=$sid=preg_replace("/[^0-9]/", "", $this->input->get('enable'));

        if (!empty($disable)) {
            $data = array('status' => '0', 'id'=> $disable );
            $this->Admin->operation_AD($data);
        }
        elseif (!empty($enable)) {
            $data = array('status' => '1', 'id'=> $enable );
            $this->Admin->operation_AD($data);
        }
        redirect('admin/ADmanagement/viewAD?msg="Operation Successfull"');
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