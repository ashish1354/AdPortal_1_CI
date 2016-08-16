function clean(){
	err.innerHTML="";
}
function loginuser(){
	var email= document.getElementById("email").value;
	var pwd  = document.getElementById("pwd").value;

	if (email=="") {
		err.innerHTML="* email can not be empty";
		return;
	}
	if (pwd=="") {
		err.innerHTML="* Password can not be empty";
		return;
	}
	document.getElementById("form").submit();	
}
function findSubCategory(){
	var id=document.getElementById("selc").value;
	window.location="http://localhost/thebigads/user/views/add_AD.php?id="+id;
}

function findSubCategory_edit(eid){
	var id=document.getElementById("selc").value;	
	window.location="http://localhost/thebigads/user/views/edit_ads.php?id="+id+"&eid="+eid;
}

function ADDad(){
	var head= document.getElementById("head").value;
	var content= document.getElementById("content").value;
	var contact= document.getElementById("contact").value;	
	var img    = document.getElementById("img").value;

	var err= document.getElementById("err");

	if (head=="") {
		err.innerHTML="* Head can not be empty.";
		return;
	}
	if (content=="") {
		err.innerHTML="* Content can not be empty";
		return;
	}
	if (contact=="") {
		err.innerHTML="* Contact can not be empty";
		return;
	}
	if (img=="") {
		err.innerHTML="* Please attach file before submit.";
		return;
	}
	document.getElementById("form").submit();	
}
function autoSubmit(){	
	document.getElementById("autoSubmit").submit();	
}