function validateForm(form) {
    var code;
    if(form.firstName.value == ""){
    	alert("Error: Username cannot be blank!");
    	form.username.focus();
    	return false;
    }

    if(form.middleName.value == ""){
    	alert("Error: middleName cannot be blank!");
    	form.pwd.focus();
    	return false; 
    }

     if(form.lastName.value == ""){
        alert("Error: lastName cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.country.value == ""){
        alert("Error: country cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.region.value == ""){
        alert("Error: region cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.address.value == ""){
        alert("Error: address cannot be blank!");
        form.pwd.focus();
        return false; 
    }

     if(form.amount.value == ""){
        alert("Error: amount cannot be blank!");
        form.pwd.focus();
        return false; 
    }


     

       if(form.currency.value == ""){
        alert("Error: currency cannot be blank!");
        form.pwd.focus();
        return false; 
    }

       if(form.fullName.value == ""){
        alert("Error: fullName cannot be blank!");
        form.pwd.focus();
        return false; 
    }

       if(form.knowPerson.value == ""){
        alert("Error: knowPerson cannot be blank!");
        form.pwd.focus();
        return false; 
    }

       if(form.uniqueCode.value == ""){
        alert("Error: uniqueCode cannot be blank!");
        form.pwd.focus();
        return false; 
    }

  
  }