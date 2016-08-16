// function registerUser(v1,v2) {
// 	var name = document.getElementById("name").value;
// 	var email= document.getElementById("email").value;
// 	var pwd  = document.getElementById("pwd").value;	
// 	var rpwd = document.getElementById("rpwd").value;

// 	var err= document.getElementById("err");
// 	if (name=="") {
// 		err.innerHTML="* Name can not be empty";
// 		return;
// 	}
// 	if (email=="") {
// 		err.innerHTML="* email can not be empty";
// 		return;
// 	}
// 	if (pwd=="") {
// 		err.innerHTML="* Password can not be empty";
// 		return;
// 	}
// 	if (rpwd=="") {
// 		err.innerHTML="* Retype Your Password.";
// 		return;
// 	}
// 	if (document.getElementById("seq").value=="") {
// 		err.innerHTML="* Fill security question.";
// 		return;
// 	}

// 	if (pwd==rpwd && seqCheck(v1,v2)) {
// 		err.innerHTML="Submitting to Ad Portal..............!!!!!!";
// 		document.getElementById("form").submit();	
// 	}	
// 	//document.getElementById("form").submit();	
// }
// function checkPass(){
// 	var pwd  = document.getElementById("pwd").value;	
// 	var rpwd = document.getElementById("rpwd").value;
// 	var err= document.getElementById("err");
// 	if (pwd.length==0 || rpwd.length==0) {
// 		err.innerHTML="";
// 		return;
// 	}
// 	if (pwd!=rpwd) {
// 		err.innerHTML="* Password Not match.";
// 	}
// 	else{
// 		err.innerHTML="  Password matched.";
// 	}
// }
function seqCheck(v1,v2){
	var v3=v1+v2;
	if (v3!=document.getElementById("seq").value) {
		err.innerHTML="* Wrong Answer";
		return false;
	}
	else{
		err.innerHTML="* Correct Answer";
		return true;
	}
}
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
