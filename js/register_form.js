function adminLogin() {
		var pw = document.forms["AdminForm"]["pass"].value;
		if(pw=="admin123"){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("result").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","admin_login.php", true);
			xmlhttp.send();			
		}
		else{
			alert("false");
		}
		return false;
}


function deleteMem(id) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("result").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","delete.php?id="+id, true);
		xmlhttp.send();

		return false;
}

function sortTable() {		
		var id = document.getElementById("adminselect").value;
		document.getElementById("adminselect");
		 var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("result").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","sort.php?id="+id, true);
		xmlhttp.send();

		return false; 
}

function validateForm() {
    var name = document.forms["RegForm"]["name"].value;
    var email = document.forms["RegForm"]["email"].value;
    var faculty = document.forms["RegForm"]["faculty"].value;
	var alertmsg = "false";
	
	//checking name field
	var objRegExp  = /^[A-Za-z\u00C0-\u00ff]+$/;
	 if(!objRegExp.test(name.charAt(0))){
        alert("Please enter a letter as your first character in name field !");
		alertmsg = "true";
	}	
		
	//checking email field
    var AT = 0;
    var lastD = isNaN(email.charAt(email.length -1));
    var tmpres = email.split(".");
    var res = tmpres[0].split("@");
    var i;
    for(i = 0; i < email.length; i++) {
	if(email.charAt(i) == '@') 
	  AT++; 
    }
    if (email == null || email == "") {
        alert("Please enter your email !");
		alertmsg = "true";
    }else if(AT > 1 || AT < 1){
        alert("You have more or less then one @, \nPlease enter an valid email with only one @!");
		alertmsg = "true";
    }else if(!lastD){
        alert("The last digit of your email cannot be a number!");
		alertmsg = "true";
    }else{
		var emailuser = res[1].toUpperCase();
	}

	//validating/checking if everything is good
	if(alertmsg == "true"){
		alertmsg = "false";
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("RegMsg").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","register_form.php?name="+name+"&email="+email+"&faculty="+faculty, true);
		xmlhttp.send();
		alert("You have registered!")
	}
	return false;
}