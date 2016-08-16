<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $userid="";
    private $username="";
	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
         $this->load->Model('Main_Home');
         $this->load->library('session');
         $this->load->Model('Admin');
         $this->userid=$this->session->userdata('u_id');
         $this->username=$this->session->userdata('u_name');
    }

    public function getAvailable(){
            if ($this->input->server('REQUEST_METHOD')=="POST") {
            $email=$this->input->post('email');
            $value=$this->Main_Home->loginCheck(array('email' => $email ));
                if (empty($value)) {
                    echo "true";
                }
                else
                    echo "false";
            }
            
        exit();
    }
    public function index(){
        $data="";
        $cat=$this->Main_Home->getAllCAtegoryANDSubcategoryWithAd();

    	$data = array(
            'bll' => 'jijji',
            'top_content' => $this->Main_Home->getCategory_forView(6),
            'image_for_slider'=>$this->Main_Home->getADs_forView(9),
            'tree_view' => $cat,
             );
    	$this->myPages(array('main_containt','include/image_slider','include/homebody', ),$data);
    }

    public function allCategories(){
        $data = array(
            'tree_view' => $this->Main_Home->getAllCAtegoryANDSubcategoryWithAd(),
             );

        $this->mypage('allCategories',$data);
    }

    public function showADs(){
            $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
            $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
            $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));
            $changed=0;
                $val=0;
              if ($NpNo!="") {
                $val=($NpNo-1)*10;
                $result=$this->Main_Home->getAllAD_BySearch($search,$val);
                
                $PpNo=$NpNo-1;
                $NpNo+=1;
                $changed=1;
              }
              if ($PpNo!="" && $changed!=1) {

                $val=($PpNo-1)*10;
                $result=$this->Main_Home->getAllAD_BySearch($search,$val);
                $NpNo=$PpNo;
                $PpNo-=1;
                $changed=1;
              }
              if($changed==0 || $NpNo==1)
              {
                $result=$this->Main_Home->getAllAD_BySearch($search,$val);
                $NpNo=2;
              }
                if (count($result)<10) {
                    $NpNo=FALSE;
                }

            $data = array(
                'add_view' => $result,
                'alluser' => $this->Main_Home->getAllUserID_NAME(),
                'name'=>$search,
                'PpNo'=> $PpNo,
                'NpNo'=> $NpNo,
                 );

             $this->mypage('listAD',$data);
    }

    public function showSingleAD(){
        $search=$this->input->get('aid');
        $result=$this->Main_Home->getSingleAD_forView($search);
        if (!empty($result)) {
            $data = array(
                'add_view' =>$result[0] ,
                'alluser' => $this->Main_Home->getAllUserID_NAME(),
                 );
            $this->mypage('showSingleAD',$data);
        }
        $this->index();
    }
    //localhost/codeigniter/index.php/Home/searchADBy?cid=137
    public function searchADBy(){
        $cid=preg_replace("/[^0-9]/", "", $this->input->get('cid'));
        $sid=preg_replace("/[^0-9]/", "", $this->input->get('sid'));
        $search=preg_replace("/[^A-Za-z0-9 ]/", "", $this->input->get('search'));
        $PpNo=preg_replace("/[^0-9]/", "", $this->input->get('PpNo'));
        $NpNo=preg_replace("/[^0-9]/", "", $this->input->get('NpNo'));

        if (!empty($cid)) {

            $changed=0;
              $val=0;
              if ($NpNo!="") {
                $val=($NpNo-1)*10;
                $result=$this->Main_Home->searchAD_ByCategory($search,$val,$cid);
                
                $PpNo=$NpNo-1;
                $NpNo+=1;
                $changed=1;
              }
              if ($PpNo!="" && $changed!=1) {

                $val=($PpNo-1)*10;
                $result=$this->Main_Home->searchAD_ByCategory($search,$val,$cid);
                $NpNo=$PpNo;
                $PpNo-=1;
                $changed=1;
              }
              if($changed==0 || $NpNo==1)
              {
                $result=$this->Main_Home->searchAD_ByCategory($search,$val,$cid);
                $NpNo=2;
              }
                if (count($result)<10) {
                    $NpNo=FALSE;
                }

            $data = array(
                'add_view' => $result,
                'alluser' => $this->Main_Home->getAllUserID_NAME(),
                'name'=>$search,
                'PpNo'=> $PpNo,
                'NpNo'=> $NpNo,
                'selc'=>$cid,
                 );

            $this->mypage('searchByCAtegory',$data);

        }
        if (!empty($sid)) {

            $changed=0;
              $val=0;
              if ($NpNo!="") {
                $val=($NpNo-1)*10;
                $result=$this->Main_Home->searchAD_BySubcategory($search,$val,$sid);                
                $PpNo=$NpNo-1;
                $NpNo+=1;
                $changed=1;
              }
              if ($PpNo!="" && $changed!=1) {
                $val=($PpNo-1)*10;
                $result=$this->Main_Home->searchAD_BySubcategory($search,$val,$sid);
                $NpNo=$PpNo;
                $PpNo-=1;
                $changed=1;
              }
              if($changed==0 || $NpNo==1)
              {
                $result=$this->Main_Home->searchAD_BySubcategory($search,$val,$sid);
                $NpNo=2;
              }
                if (count($result)<10) {
                    $NpNo=FALSE;
                }

            $data = array(
                'add_view' => $result,
                'alluser' => $this->Main_Home->getAllUserID_NAME(),
                'name'=>$search,
                'PpNo'=> $PpNo,
                'NpNo'=> $NpNo,
                'sels'=>$sid,
                 );

            $this->mypage('searchBySubcategory',$data);

        }        
        
    }


//---------------------------------------------User Functions-------------------------------------------------
    public function userRegister($msg=""){
        $msg=$this->session->flashdata('msg');
        
        $data = array(
            'msg' => $msg,
            'lname' => 'Name * :',
            'namee'  => array(
                'id' => 'name',
                'name'=> 'name', 'onclick'=> 'clean()','onkeyup'=> 'clean()',
                'class'=> 'do_input', 'size'=>'50',
             ),

            'lemail' => 'Email * :',
            'email'  => array(
                'id' => 'email','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'name'=> 'email',
                'class'=> 'do_input', 'size'=>'50',
              ),

            'lpwd' => 'Password * :',
            'pwd'  => array(
                'id' => 'pwd','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'name'=> 'pwd',
                'class'=> 'do_input', 'size'=>'50',
             ),  

            'lrpwd' => 'Retype Password * :',
            'rpwd'  => array(
                'id' => 'rpwd','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'name'=> 'rpwd',
                'class'=> 'do_input', 'size'=>'50',
             ),  

            'seq'  => array(
                'id' => 'seq',
                'name'=> 'seq','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'class'=> 'do_input', 'size'=>'10',
             ), 

            'submit'=> array(
                'type' =>'submit','class'=> 'submit_buttons', 
                'value' => 'Register', ),

             );
        $this->mypage('user/registerpage',$data);
    }

    public function completeRegister(){
        if ($this->input->server('REQUEST_METHOD')=="POST") {
            $send = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'pwd' => $this->input->post('pwd'),
                'ads_li'=>0,
                 );
            $this->Main_Home->createUser($send);
            $this->session->set_flashdata('msg', 'User successfully registered');
            redirect("Home/userRegister");
            //$this->userRegister("User successfully registered.");
        }
    }

    public function loginUser($msg=""){
        if ($this->session->userdata('u_id')) {
            $this->dashboard("You are already login.");
        }

        if ($this->input->server('REQUEST_METHOD')=="POST") {
            $data = array(
                'email' => $this->input->post('email'),
                'pwd' => $this->input->post('pwd'), );
            $res= $this->Main_Home->loginCheck($data);
            if (!empty($res)) {
                $this->session->set_userdata( array('u_id' => $res[0]['id'],'u_name'=> $res[0]['name']));
                redirect('Home/dashboard');
            }
            $this->session->set_flashdata('msg', 'Email or Password do not matched.');
            redirect('Home/loginUser');
        }
        $msg=$this->session->flashdata('msg');
        $data = array(
            'msg' => $msg,
            'lemail' => 'Email * :',
            'email'  => array(
                'id' => 'email','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'name'=> 'email',
                'class'=> 'do_input', 'size'=>'50',
                ),

            'lpwd' => 'Password *  :',
            'pwd'  => array(
                'id' => 'pwd','onclick'=> 'clean()','onkeyup'=> 'clean()',
                'name'=> 'pwd',
                'class'=> 'do_input', 'size'=>'50',
                ),  

            'submit'=> array(
                'type' =>'submit','class'=> 'submit_buttons',
                'value' => 'Login', ),

             );
        $this->mypage('user/userlogin',$data);        
    }

    public function dashboard($msg=""){
        $tt="";
        if ($this->session->userdata('u_id')>0) {
            if ($this->utility('dif')<0) {
                $tt="TRUE";
            }
        if (empty($msg)) {
           $msg=$this->session->flashdata('msg');
        }
        $data = array(
            'innerpage' =>'user/dashbox' ,
            'l_date'=> strtotime( $this->utility('date')),
            'tt_add' => $this->utility('ads'),
            'pub_add' => $this->getAdCountBy_uid(""),
            'msg'=>$msg,
            'tt'=> $tt,
             );
        $this->mypage( 'user/dashboard',$data);
        }else{
           redirect('Home/');
        }
    }

    public function selectSubscription(){
        if ($this->session->userdata('u_id')>0) {
            $PpNo=$this->input->get('PpNo');
            $NpNo=$this->input->get('NpNo');
            $changed=0;
                $val=0;
              if ($NpNo!="") {
                $val=($NpNo-1)*5;
                $result=$this->Main_Home->getSubscr_forView($val);
                
                $PpNo=$NpNo-1;
                $NpNo+=1;
                $changed=1;
              }
              if ($PpNo!="" && $changed!=1) {

                $val=($PpNo-1)*5;
                $result=$this->Main_Home->getSubscr_forView($val);
                $NpNo=$PpNo;
                $PpNo-=1;
                $changed=1;
              }
              if($changed==0 || $NpNo==1)
              {
                $result=$this->Main_Home->getSubscr_forView($val);
                $NpNo=2;
              }
                if (count($result)<5) {
                    $NpNo=FALSE;
                }
        $data = array(
            'subscr' =>$result ,
            'PpNo'=> $PpNo,
            'NpNo'=> $NpNo,
                 );
        $this->mypage( 'user/subscription',$data);
        }else{
           redirect('Home/');
        }
    }

    //For Delete 
    public function myRequest(){
       if ($this->session->userdata('u_id')) {
        if ($this->input->server('REQUEST_METHOD')=="POST") {
           // $url="https://www.sandbox.paypal.com/cgi-bin/webscr";
            $sid=$this->input->post("item_name");
            $row=$this->Main_Home->getSubscr_ByID($sid);
            if (empty($row)) {
                $this->dashboard("Something went worng with subscription.");
                return;
            }
            $fields = array(
                'business' => 'ashish.d-facilitator@cisinlabs.com',
                'cmd' => '_xclick',
                'item_name'=> $sid,
                'item_number'=> $this->userid,
                'credits'=> '510',
                'userid'=> '1',
                'amount'=> $row[0]['prise'],
                'no_shipping'=> '1',
                'currency_code'=> 'USD',
                'return'=> 'http://localhost/codeigniter/index.php/Home/successfull',
                'cancel_return'=> 'http://localhost/codeigniter/index.php/Home/message',
                'notify_url'=> 'http://localhost/codeigniter/index.php/Home/notify',
                'handling'=> '0',
                );
            $data = array(
                'hide' => $fields , );
            $this->load->view( 'user/sendingToPaypal',$data);
        }
      }else{
           redirect('Home/');
        }        
    }

    public function successfull(){
       if ($this->session->userdata('u_id')>0) {
        if ($this->input->server('REQUEST_METHOD')=="POST") {
            $this->notify();
            redirect('Home/message');
        }
      }else{
           redirect('Home/');
        }
    }

    public function notify(){
            $sid=$this->input->post('item_name');
            $uid=$this->input->post('item_number');
            $pay=$this->input->post('payment_gross');
            $status=$this->input->post('payment_status');

            $sub=$this->Main_Home->getSubscr_ByID($sid);
            $subscr=$sub[0];
            $day=$subscr['day'];
            $ads=$subscr['ads'];

            $this->Main_Home->applySubscroptionOnUser($ads,$uid);
            $txdata = array('uid' =>$uid ,'pay_USD'=> $pay,'pay_status'=> $status );
            $this->Main_Home->addTxan($txdata);
            $this->Main_Home->disableAllADByID(array('status' =>'0' , ),$uid);
    }
    public function message($msg=""){
       if ($this->session->userdata('u_id')>0) {
            $msg="Your transaction successfully completed.";
            $this->dashboard($msg);
       }else{
           redirect('Home/');
        }
    }

    public function logut(){
        if($this->session->userdata('u_id')>0){
            $this->session->unset_userdata('u_id'); 
            $this->session->unset_userdata('u_name');            
            $this->session->sess_destroy();
        }
            redirect('Home/loginUser');
    }
//------------------====================Post Ad =========================-------------------------------------

    public function postAD(){
       if ($this->session->userdata('u_id')>0) {
         if ($this->utility('dif')>0 && $this->getAdCountBy_uid("")<$this->utility('ads')) {
                    $msg=$this->session->flashdata('msg');
                    if ($this->input->server('REQUEST_METHOD')=="POST") {
                        $send = array(
                        'sid' => $this->input->post('selc1'),
                        'head' => $this->input->post('head'),
                        'content' => $this->input->post('content'),
                        'contact' => $this->input->post('contact'),
                        'cost' => $this->input->post('cost'),
                        'uid' => $this->userid,
                        'status' => '0',
                        'edt' =>'TRUE',
                         );
                        $ID=$this->Admin->addAD($send);
                        $this->fileupload($ID,'./images/ad/');
                        $msg="\"New AD successfully added.\"";
                        $this->session->set_flashdata('msg', $msg);
                        redirect('Home/postAD');
                    }
                    $cid=$this->input->get('cid');
                    $select=$this->Admin->getAllCategoryNameWithID();
                    if (empty($cid) || empty($select[$cid])) {
                        $cid=key($select);
                    }
                    $data = array(
                        'msg'=>$msg,
                      'lcatn' => 'Select Category  * :',
                      'catn' =>array(
                        'name' => 'selc', 'width'=>29,
                        'id'  => 'selc',
                        'onchange'=> 'findSubCategory()',
                        'class' => 'do_input', ),
                      'select' =>  $select,
                      'selected'=> $cid,

                      'lcatn1' => 'Select Subcategory  * :',
                      'catn1' =>array(
                        'name' => 'selc1',
                        'id'  => 'selc1',
                        'class' => 'do_input', ),
                      'select1' =>  $this->Admin->getAllSubcategoryNameWithID_of_cid($cid),
                      'selected1'=> '',

                      'lhead'=>'Head  * :',
                      'head' => array(
                        'type'  => 'text',
                        'name'  => 'head','size'=>24,
                        'id'    => 'head',      'value' => '',
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lcontent'=>'Content * :',
                      'content' => array(
                        'type'  => 'textarea', 'rows'=>9,'cols'=>8,
                        'name'  => 'content', 
                        'id'    => 'content',      'value' => '',
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'style'=>"width: 260px",
                         ),

                      'lcontact'=>'Contact * :',
                      'contact' => array(
                        'type'  => 'text',
                        'name'  => 'contact','size'=>24,
                        'id'    => 'contact',      'value' => '',
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lcost'=>'Cost In $  * :',
                      'cost' => array(
                        'type'  => 'text',
                        'name'  => 'cost','size'=>24,
                        'id'    => 'cost',      'value' => '',
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lico'=>'Icon (jpg,png,ico) * :',
                      'ico' => array('name'  => 'data',
                        'id'    => 'img','size'=>29,
                        'name' => 'ico', 'class' =>'do_input'
                         ),

                      'submit' => array(
                        'type'=>'submit',
                        'id' => 'btn',
                        'name'=> 'btn',
                        'value'=> 'Add AD', 'class' => 'submit_buttons',
                        ),
                        
                         );
                $this->mypage( 'user/postad',$data);
         }else{
            $this->dashboard("You can not post new AD. Choose new subscription before ");
         }
        }else{
           redirect('Home/');
        }
    }

    public function editAd(){
       if ($this->session->userdata('u_id')>0) {
         if ($this->utility('dif')>0 && $this->getAdCountBy_uid("")<$this->utility('ads')) {
                    if ($this->input->server('REQUEST_METHOD')=="POST") {
                        echo "In post";
                        $send = array(
                        'sid' => $this->input->post('selc1'),
                        'head' => $this->input->post('head'),
                        'content' => $this->input->post('content'),
                        'contact' => $this->input->post('contact'),
                        'cost' => $this->input->post('cost'),
                        'uid' => $this->userid,
                        'id' =>$this->input->post('id'),
                        'status' => '0',
                        'edt' =>'TRUE',
                         );
                        $ID=$this->Admin->editAd($send);
                        $this->fileupload($ID,'./images/ad/');
                        $msg="\"AD edited successfully added.\"";
                        $this->dashboard($msg);
                    }
                    $aid=$this->input->get('aid');
                    $cid=$this->input->get('cid');
                    $row=$this->Main_Home->getSingleEditAble_AD_forViewAll($aid);
                    if (empty($row)) {
                    $this->dashboard("Something went worng with Edit AD.");
                    return;
                    }
                    $row=$row[0];
                    $msg="";
                    $select=$this->Admin->getAllCategoryNameWithID();
                    if (empty($cid) || empty($select[$cid])) {
                        $cid=$row['cid'];
                    }

                    $data = array(
                      'msg'=>$msg,
                      'hide' => array(
                        'id'    => $aid,   
                         ),
                      'lcatn' => 'Select Category :',
                      'catn' =>array(
                        'name' => 'selc',
                        'id'  => 'selc',
                        'onchange'=> 'findSubCategory1('.$aid.')',
                        'class' => 'do_input', ),
                      'select' =>  $select,
                      'selected'=> $cid,

                      'lcatn1' => 'Select Subcategory :',
                      'catn1' =>array(
                        'name' => 'selc1',
                        'id'  => 'selc1',
                        'class' => 'do_input', ),
                      'select1' =>  $this->Admin->getAllSubcategoryNameWithID_of_cid($cid),
                      'selected1'=> $row['sid'],

                      'lhead'=>'Head :',
                      'head' => array(
                        'type'  => 'text','size'=>24,
                        'name'  => 'head',
                        'id'    => 'head',      'value' => $row['head'],
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lcontent'=>'Content :',
                      'content' => array(
                        'type'  => 'textarea',
                        'name'  => 'content', 'cols'=>10,'row'=>5,
                        'id'    => 'content',      'value' => $row['content'],
                        'onclick' => 'clean()','style'=>"width: 260px",
                         ),

                      'lcontact'=>'Contact :',
                      'contact' => array(
                        'type'  => 'text',
                        'name'  => 'contact','size'=>24,
                        'id'    => 'contact',      'value' => $row['contact'],
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lcost'=>'Cost :',
                      'cost' => array(
                        'type'  => 'text',
                        'name'  => 'cost','size'=>24,
                        'id'    => 'cost',      'value' => $row['cost'],
                        'onclick' => 'clean()',
                        'onkeypress'=> 'clean()',
                        'class'=>'do_input',
                         ),

                      'lico'=>'Icon :',
                      'ico' => array('name'  => 'data',
                        'id'    => 'img',
                        'name' => 'ico', 'class' =>'do_input'
                         ),

                      'submit' => array(
                        'type'=>'submit',
                        'id' => 'btn',
                        'name'=> 'btn',
                        'value'=> 'Edit AD',
                        'class' => 'submit_buttons',
                        ),
                        
                         );
                $this->mypage( 'user/editad',$data);
         }else{
            $this->dashboard("You can not post new AD. Choose new subscription before ");
         }
        }else{
           redirect('Home/');
        }
    }

    public function editAD1(){
                    if ($this->input->server('REQUEST_METHOD')=="POST") {
                        echo "In post";
                        $send = array(
                        'sid' => $this->input->post('selc1'),
                        'head' => $this->input->post('head'),
                        'content' => $this->input->post('content'),
                        'contact' => $this->input->post('contact'),
                        'cost' => $this->input->post('cost'),
                        'uid' => $this->userid,
                        'id' =>$this->input->post('id'),
                        'status' => '0',
                        'edt' =>'TRUE',
                         );
                        $ID=$this->Admin->editAd($send);
                        $this->fileupload($ID,'./images/ad/');
                        $msg="\"AD edited successfully.\"";
                        $this->dashboard($msg);
                    }
    }

    public function viewMyADs($msg=""){
       if ($this->session->userdata('u_id')>0) {
         if ($this->utility('dif')>0 ) {
                $search=$this->userid;
                $PpNo=$this->input->get('PpNo');
                $NpNo=$this->input->get('NpNo');
                $changed=0;
                    $val=0;
                  if ($NpNo!="") {
                    $val=($NpNo-1)*10;
                    $result=$this->Main_Home->getAllAD_BySearch_forUser($search,$val);
                    
                    $PpNo=$NpNo-1;
                    $NpNo+=1;
                    $changed=1;
                  }
                  if ($PpNo!="" && $changed!=1) {

                    $val=($PpNo-1)*10;
                    $result=$this->Main_Home->getAllAD_BySearch_forUser($search,$val);
                    $NpNo=$PpNo;
                    $PpNo-=1;
                    $changed=1;
                  }
                  if($changed==0 || $NpNo==1)
                  {
                    $result=$this->Main_Home->getAllAD_BySearch_forUser($search,$val);
                    $NpNo=2;
                  }
                    if (count($result)<10) {
                        $NpNo=FALSE;
                    }

                $data = array(
                    'add_view' => $result,
                    'alluser' => $this->Main_Home->getAllUserID_NAME(),
                    'PpNo'=> $PpNo,
                    'NpNo'=> $NpNo,
                    'msg' =>$msg,
                     );
                   $this->mypage( 'user/viewads',$data);      
            }else{
            $this->dashboard("You can not view your ads. Choose new subscription before");
         }
        }else{
           redirect('Home/');
        }
    }

    public function status_oper(){
       if ($this->session->userdata('u_id')>0) {        
        $disable=$sid=$this->input->get('disable');
        $enable=$sid=$this->input->get('enable');

        if (!empty($disable)) {
            $data = array('status' => '0', 'id'=> $disable );
            $this->Admin->operation_AD($data);
        }
        elseif (!empty($enable) && $this->getAdCountBy_uid("")<$this->utility('ads')) {

            $data = array('status' => '1','edt'=>'FALSE', 'id'=> $enable );
            $this->Admin->operation_AD($data);
        }
        else{
            $this->dashboard("You can not publish your AD. Choose new subscription before ");
        }
        $this->viewMyADs("Operation Successfull");
        }else{
           redirect('Home/');
        }
    } 
//-----------------------------------------------Utility Function----------------------------------------------
    public function utility($ask){
        $user=$this->Main_Home->myquery("SELECT *,datediff(est,sysdate()) date FROM user WHERE id=".$this->userid);
        if (!empty($user) ){
            $user=$user[0];
            switch ($ask) {
                case 'date':
                    return $user['est'];
                    break;
                case 'ads':
                    return $user['ads_li'];
                    break;
                case 'dif':
                    return $user['date'];
                    break;                
            }
        }
    }

    public function getAdCountBy_uid($value){
        $ads= $this->Main_Home->getAdCountBy_uid(array('uid' => $this->userid, ));
        $published=$this->Main_Home->getAdCountBy_uid(array('uid' => $this->userid,'status'=>'1' ));
        if ($value=="tads") {
            return $ads;
        }
        else
            return count($published);
    }
//---------------------------------------------User Function Ends----------------------------------------------    
    public function myPages($sentview,$data){
        $data= $data + array('userid' => $this->userid,'username'=>$this->username, );   
        $this->load->view('include/header',$data);
        foreach ($sentview as $key => $value) {
            $this->load->view($value,$data);
        }
        $this->load->view('include/footer');
    }
    public function mypage($sentview,$data){
        $data= $data + array('userid' => $this->userid,'username'=>$this->username, );      
        $this->load->view('include/header',$data);
        $this->load->view($sentview,$data);
        $this->load->view('include/footer');
    }

    public function template($sentpage,$parts,$data){
    	$data['main_view']['header']='include/header';
		foreach ($parts as $page) {
			$data['main_view'][]= $page;
		}
		$data['main_view']['footer']='include/footer';
		$this->load->view($sentpage,$data);
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

    public function javaError(){
        $this->load->view('errors/error_javascript');
    }
}
?>