function checkForm(form)
{
    if(form.username.value == "") {
        alert("Error: Username cannot be blank!");
        form.username.focus();
        return false;
    }
    
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        form.username.focus();
        return false;
    }
    
    if(form.email.value == "") {
        alert("Error: Email cannot be blank!");
        form.email.focus();
        return false;
    }
    
    se = /\S+@\S+\.\S+/;
    if(!se.test(form.email.value)) {
        alert("Error: Email format is wrong!");
        form.email.focus();
        return false;
    }
    
    if(form.password1.value != "" && form.password1.value == form.password2.value) {
        if(form.password1.value.length < 6) {
            alert("Error: Password must contain at least six characters!");
            form.password1.focus();
            return false;
        }
        if(form.password1.value == form.username.value) {
            alert("Error: Password must be different from Username!");
            form.password1.focus();
            return false;
        }
    }
    else{
        alert("Error: Please check that you've entered and confirmed your password!");
        form.password1.focus();
        return false;
    }
}
