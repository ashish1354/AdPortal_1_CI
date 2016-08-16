<?php

class Admin extends CI_Model{
	

	public function __construct() { 
         parent::__construct(); 
         $this->load->database();
    }


	public function loginCheck($data){
		$query = $this->db->get_where("admin",$data); 
		//echo $this->db->last_query();
		$data = $query->result_array();
		return count($data);
	}

	public function addCategory($data){
		$this->db->insert('category', $data);
		return $this->last_Insert();
	}

	public function addSubCategory($data){
		$this->db->insert('sub_category', $data);
		return $this->last_Insert();
	}


	public function addSubscription($data){
		$this->db->insert('subscr', $data);
		return $this->last_Insert();
	}

	public function addAD($data){
		$this->db->insert('ad', $data);
		$id= $this->last_Insert();
		$this->db->query("UPDATE ad SET ad_date=sysdate() WHERE id=$id");
		return $id;
	}

	public function editCategory($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('category', $data);
	}

	public function editSubcategory($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('sub_category', $data);
	}

	public function editSubscription($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('subscr', $data);
	}

	public function editAd($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('ad', $data);
	}

	public function deleteCategory($data){
		$this->db->where('id',$data['id']);
		$res= $this->db->delete('category');
		return $res;
	}

	public function deleteSubcategory($data){
		$this->db->where('id',$data['id']);
		$res= $this->db->delete('sub_category');
		return $res;
	}

	public function getCategory_forView($data,$lim){
		$query=$this->db->query("SELECT * FROM category WHERE name LIKE '%$data%' LIMIT $lim ,10;");
		return $query->result_array();
	}

	public function getSubscription_forView($data,$lim){
		$query=$this->db->query("SELECT * FROM subscr WHERE day LIKE '%$data%' OR ads LIKE '%$data%' OR prise LIKE '%$data%' OR status LIKE '%$data%' LIMIT $lim ,10;");
		return $query->result_array();
	}

	public function getADs_forView($head="",$lim,$cid="",$sid=""){
		$sql="SELECT a.id adID,a.head adHead, a.content content,a.contact contact,a.status status,a.cost cost, s.name S_Name,s.id S_ID,c.name C_Name ,c.id C_id  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id";
		$sql .=" AND c.id LIKE '%$cid%' AND s.id LIKE '%$sid%' AND ( a.head LIKE '%$head%' OR a.content LIKE '%$head%') LIMIT $lim,10 ";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function getCategory_ByID($data){
		$query=$this->db->get_where("category",$data);
		return $query->result_array();
	}

	public function getSubcategory_ByID($data){
		$query=$this->db->get_where("sub_category",$data);
		return $query->result_array();
	}

	public function getSubscription_ByID($data){
		$query=$this->db->get_where("subscr",$data);
		return $query->result_array();
	}

	public function getAllCategoryNameWithID(){
		$this->db->select('id,name');
		$this->db->from("category"); 
		$query = $this->db->get();
		$data = $query->result_array();
		foreach ($data as $key => $value) {
			$newdata[$value['id']]=$value['name'];
		}
		return $newdata;
	}

	public function getAllSubcategoryNameWithID_of_cid($data){
		$this->db->select('id,name');
		$this->db->from("sub_category"); 
		if (!empty($data)) {
			$this->db->where("cid",$data);
			$query = $this->db->get();
		}
		else{
			$query = $this->db->get();
		}
		$data = $query->result_array();
		$newdata = array( );
		foreach ($data as $key => $value) {
			$newdata[$value['id']]=$value['name'];
		}
		return $newdata;
	}

	public function getADBy_aid($data){
		$query=$this->db->get_where('ad',$data);
		return $query->result_array();
	}

	public function getSubCategory_forView($name,$cid,$lim){
		$sql="SELECT s.id id,s.name name,s.slug slug,s.keyy keyy,s.cid cid,c.name cname  FROM sub_category s,category c WHERE s.cid=c.id and (s.keyy LIKE '%$name%' OR s.name LIKE '%$name%' OR s.slug LIKE '%$name%' ) and s.cid LIKE '%$cid%' LIMIT $lim,10;";	
		$query=$this->db->query($sql);
		return $query->result_array();
	}		

	public function operation_AD($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('ad', $data);
	}
//-----------------------------------------------------------------

	public function last_Insert(){
		$query=$this->db->query("SELECT last_insert_id() id;");
		$result=$query->result_array();
		return $result[0]['id'];
	}
}

?>