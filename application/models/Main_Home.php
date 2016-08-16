<?php

class Main_Home extends CI_Model{
	

	public function __construct() { 
         parent::__construct(); 
         $this->load->database();
    }

	public function getCategory_forView($lim){
		$query=$this->db->query("SELECT * from category ORDER BY `name` ASC LIMIT $lim;");
		return $query->result_array();
	}

	public function getADs_forView($lim){
		$sql="SELECT a.id adID,a.head adHead, a.content content,a.contact contact,a.status status,a.cost cost, s.name S_Name,s.id S_ID,c.name C_Name ,c.id C_id  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.status='1' ORDER BY RAND() LIMIT $lim;";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function countAD_ByCategoryid($cid){
		$query=$this->db->query(" SELECT count(a.id) FROM ad a   LEFT JOIN sub_category s ON a.sid=s.id  LEFT JOIN category c  ON s.cid=c.id   WHERE a.status='1' AND c.id=$cid;");
		return $query->result_array();
	}

	public function countAD_BySubcategoryid($sid){
		$query=$this->db->query("SELECT count(a.id) cun FROM ad a   LEFT JOIN sub_category s ON a.sid=s.id WHERE a.status='1' AND s.id=$sid;");
		$result= $query->result_array();
		return $result[0]['cun'];
	}

	public function getAllCAtegoryANDSubcategoryWithAd(){
		$sql="SELECT c.id cid,c.name cname,s.id sid,s.name sname,a.id aid,a.head ahead,count(a.id) adcunt FROM category c LEFT JOIN sub_category s  ON s.cid=c.id LEFT JOIN ad a ON a.sid=s.id AND a.status='1' GROUP BY s.id ORDER BY c.name,s.name;";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function getAllAD_BySearch($data,$lim){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.status='1'AND (head LIKE '%$data%' OR content LIKE '%$data%' OR cost LIKE '%$data%' OR c.name LIKE '%$data%' OR s.name LIKE '%$data%' ) ORDER BY a.id DESC LIMIT $lim,10";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}

	public function getAllAD_BySearch_forUser($data,$lim){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate,a.edt edit, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.uid=$data ORDER BY a.id DESC LIMIT $lim,10";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function searchAD_ByCategory($data,$lim,$cid){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.status='1'AND c.id=$cid AND(head LIKE '%$data%' OR content LIKE '%$data%' OR cost LIKE '%$data%' OR c.name LIKE '%$data%' OR s.name LIKE '%$data%' ) ORDER BY a.id DESC LIMIT $lim,10";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}

	public function searchAD_BySubcategory($data,$lim,$sid){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.status='1'AND s.id=$sid AND(head LIKE '%$data%' OR content LIKE '%$data%' OR cost LIKE '%$data%' OR c.name LIKE '%$data%' OR s.name LIKE '%$data%' ) ORDER BY a.id DESC LIMIT $lim,10";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}

	public function getSingleAD_forView($data){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.status='1'AND a.id=$data;";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}
	public function getSingleAD_forViewAll($data){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND s.cid=c.id AND a.id=$data;";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}
	public function getSingleEditAble_AD_forViewAll($data){
		$sql=" SELECT a.id aid,a.head head, a.content content,a.contact contact,a.status status,a.cost cost,a.uid uid,a.ad_date addate, s.name sname,s.id sid,c.name cname ,c.id cid  FROM ad a,sub_category s,category c WHERE a.sid=s.id AND a.edt='TRUE' AND s.cid=c.id AND a.id=$data;";
		$query=$this->db->query($sql);
		if(!empty($query))
		return $query->result_array();
	}

	public function getAllUserID_NAME(){
		$query=$this->db->get("user");
		$result= $query->result_array();
		foreach ($result as $key => $value) {
			$sendData[$value['id']]=$value['name'];
		}
		return $sendData;
	}
//-------------------------------------------------User Section----------------------------------------------------
	public function createUser($data){
		$this->db->insert('user',$data);
	}

	public function loginCheck($data){
		$query = $this->db->get_where("user",$data); 
		$data = $query->result_array();
		return $data;
	}
	public function myquery($sql){
		$query = $this->db->query($sql); 
		$data = $query->result_array();
		return $data;
	}
    public function getAdCountBy_uid($data){
        $query = $this->db->get_where("ad",$data); 
		return $query->result_array();
    }
//-------------------------------------------------Subscription-----------------------------------------------------
	public function getSubscr_forView($lim){
		$query=$this->db->query("SELECT * from subscr WHERE status='TRUE' LIMIT $lim,5;");
		return $query->result_array();
	}

	public function getSubscr_ByID($data){
		$this->db->where('id',$data);
		$query=$this->db->get("subscr");
		return $query->result_array();
	}

    public function applySubscroptionOnUser($ads,$id){
    	$sql="UPDATE user SET ads_li=$ads,sst=sysdate(), est=ADDDATE(sysdate(),INTERVAl $ads DAY) WHERE id=$id ;";
		$query=$this->db->query($sql);
    }

    public function addTxan($data){
    	$this->db->insert('payment',$data);
    }

    public function disableAllADByID($data,$uid){
    	$this->db->where('uid',$uid);
    	$this->db->update('ad',$data);
    }
}
?>