function myFun(){
		var id=document.getElementById("lgid").value;
		var pass=document.getElementById("lgpass").value;
		var err = document.getElementById("err");

		if (id=="") {
			err.innerHTML =  "* Login ID can not be empty";
			return;
		}

		if (pass=="") {
			err.innerHTML = "* Password can not be empty";
			return;
		}

		document.getElementById("form").submit();	

	}


	function clean(){
		err.innerHTML="";
	}

