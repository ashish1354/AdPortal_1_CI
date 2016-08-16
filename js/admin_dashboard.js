function showList(x){
	 var xx = document.getElementById("val_2").innerHTML;
  
	{
     document.getElementById("ul_hide").removeAttribute("hidden");
	 document.getElementById("val_2").innerHTML="&#8609";
	}
}
function svalue(){
	
   var key= document.getElementById("chbx").checked; 
    if(!key){
     document.getElementById("ico").style.display = 'block';
    }
	else{
     document.getElementById("ico").style.display = 'none';
	}   
}
function check_2(){
	var name= document.getElementById("name").value;
	var slug= document.getElementById("slug").value;
	var key= document.getElementById("key").value;	
	var ico= document.getElementById("ico").value;
	var chbx= document.getElementById("chbx").checked;

	var err= document.getElementById("err");
	if (name=="") {
		err.innerHTML="* Name can not be empty"+chbx;
		return;
	}
	if (slug=="") {
		err.innerHTML="* Slug can not be empty";
		return;
	}
	if (key=="") {
		err.innerHTML="* Keyword can not be empty";
		return;
	}
	if (ico=="" && !chbx) {
		err.innerHTML="* Please attach file before submit.";
		return;
	}

	var ext=ico.substr(ico.lastIndexOf('.') + 1).toLowerCase();

	if ((ext=="jpeg" || ext=="png" || ext=="ico" || ext=="jpg") || chbx) 
	{
	    document.getElementById("form").submit();	
	}
	else{
		err.innerHTML="* Please attach only Image file.";
		return;
	}

}

function check(){
	var name= document.getElementById("name").value;
	var slug= document.getElementById("slug").value;
	var key= document.getElementById("key").value;	
	var ico= document.getElementById("ico").value;

	var err= document.getElementById("err");
	if (name=="") {
		err.innerHTML="* Name can not be empty";
		return;
	}
	if (slug=="") {
		err.innerHTML="* Slug can not be empty";
		return;
	}
	if (key=="") {
		err.innerHTML="* Keyword can not be empty";
		return;
	}
	if (ico=="") {
		err.innerHTML="* Please attach file before submit.";
		return;
	}

	var ext=ico.substr(ico.lastIndexOf('.') + 1).toLowerCase();

	if (ext=="jpeg" || ext=="png" || ext=="ico" || ext=="jpg") 
	{
	document.getElementById("form").submit();	
	}
	else{
		err.innerHTML="* Please attach only Image file.";
		return;
	}

}
function clean(){
	err.innerHTML="";
};
function checkSubCategory(){
	var name= document.getElementById("name").value;
	var slug= document.getElementById("slug").value;
	var key= document.getElementById("key").value;	
	var selc= document.getElementById("selc").value;	

	var err= document.getElementById("err");
	if (name=="") {
		err.innerHTML="* Name can not be empty.";
		return;
	}
	if (slug=="") {
		err.innerHTML="* Slug can not be empty";
		return;
	}
	if (key=="") {
		err.innerHTML="* Keyword can not be empty";
		return;
	}
	if (selc=="") {
		err.innerHTML="* Please Select category before submit.";
		return;
	}
	document.getElementById("form").submit();	
}

function autoSubmit(){	
	document.getElementById("autoSubmit").submit();	
};
function findSubCategory(){
	var id=document.getElementById("selc").value;
	var ui=document.getElementById("addAD");	
	window.location=ui+"?cid="+id;
}
function findSubCategory1(v1){
	var id=document.getElementById("selc").value;
	var ui=document.getElementById("editAd");	
	window.location=ui+"?cid="+id+"&aid="+v1;
}
function ADDad(){
	var head= document.getElementById("head").value;
	var content= document.getElementById("content").value;
	var contact= document.getElementById("contact").value;	
	var img    = document.getElementById("img").value;
	var cost    = document.getElementById("cost").value;

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
	if (cost=="") {
		err.innerHTML="* Cost can not be empty.";
		return;
	}
	document.getElementById("form").submit();	
}
