function validateForm(form) {
    if(form.username.value == ""){
    	alert("Error: Username cannot be blank!");
    	form.username.focus();
    	return false;
    }

    if(form.country.value == ""){
    	alert("Error: Password cannot be blank!");
    	form.pwd.focus();
    	return false; 
    }

     if(form.region.value == ""){
        alert("Error: Password cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.userMail.value == ""){
        alert("Error: Password cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.emailRepeat.value == ""){
        alert("Error: Password cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.password.value == ""){
        alert("Error: Password cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.passwordRepeat.value == ""){
        alert("Error: Password cannot be blank!");
        form.pwd.focus();
        return false; 
    }

  }