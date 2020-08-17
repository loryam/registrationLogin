function validateForm(form) {
    if(form.username.value == ""){
    	alert("Error: Username cannot be blank!");
    	form.username.focus();
    	return false;
    }

    if(form.pwd.value == ""){
    	alert("Error: Password cannot be blank!");
    	form.pwd.focus();
    	return false; 
    }
  }