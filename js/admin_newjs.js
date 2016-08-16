function add_subs(){
	var day= document.getElementById("day").value;
	var na = document.getElementById("na").value;
	var pi = document.getElementById("pi").value;

	var err= document.getElementById("err");

	if (day=="") {
		err.innerHTML="* Days can not be empty.";
		return;
	}
	if (na=="") {
		err.innerHTML="* Number Of Ads can not be empty";
		return;
	}
	if (pi=="") {
		err.innerHTML="* Prize can not be empty";
		return;
	}	
	document.getElementById("form_sub").submit();	
}