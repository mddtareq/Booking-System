var validName=true;
var validId=true;
var validEmail=true;
var validPhone=true;
var validDepartment=true;
var validPassword=true;
var validRepassword=true;
var valid=true;

function isValidUserID(id){
        if(/^[2]{1}[0]{1}[2]{1}[0]{1}(-)[0-9]{1,4}$/.test(id)){
        return true;
    }
    else {
        return false;
    }
}
function isValidPass(password){
    if(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/.test(password))
    {
        return true;
    }else{
        return false;
    }
}
function isValidName(name){
	if(/^[a-zA-Z ]*$/.test(name)){
        return true;
    }
    else{
        return false;
    }
}

function isValidPhone(phone){
    if(/^(0088|\+88)?(01)[13456789]{1}[0-9]{8}$/.test(phone)){
        return true;
    }
    else {
        return false;
    }
}
function isValidEmail(email) {
    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
        return true;
    }
    else {
        return false;
    }

}


function checkEmail(userEmail){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("emailSpan").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../controller/RegistrationExist.php?email="+userEmail, true);
    xhttp.send();
}

function checkUserID(userId){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("idSpan").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../controller/RegistrationExist.php?id="+userId, true);
    xhttp.send();
}




function validateRegistrationForm()
{

	var userName=document.getElementById('name');
    var userId=document.getElementById('id');
    var userPhone=document.getElementById('phone');
    var userEmail=document.getElementById('email');
    var userDepartment=document.getElementById('department');
    var userPassword=document.getElementById('password');
    var userRepassword=document.getElementById('rePassword');

    if(userName.value.length===0)
    {
        document.getElementById("nameSpan").innerText="Field can not be empty!";
        validName=false;
    }else{
            if(!isValidName(userName.value.toString()))
        {
            document.getElementById("nameSpan").innerText = "Must contain only alphabets And white Space";
            validName = false;
        }else{
            document.getElementById("nameSpan").innerText = "";
            validName = true;
        }
        }


    if(userId.value.length===0)
    {
        document.getElementById("idSpan").innerText="Field can not be empty!";
        validId=false;
    }else{

        if(!isValidUserID(userId.value.toString()))
        {
            document.getElementById("idSpan").innerText = "Invalid User ID";
            validId = false;
        }else{
           if(checkUserID()){
                valid=false;

           }else{
           document.getElementById("idSpan").innerText = "";
            validId = true;}

        }
    }


    if(userPhone.value.length===0)
    {
        document.getElementById("phoneSpan").innerText="Field can not be empty!";
        validPhone=false;
    }else{
        if(!isValidPhone(userPhone.value.toString()))
        {
            document.getElementById("phoneSpan").innerText = "Invalid mobile number";
            validPhone = false;
        }else{
            document.getElementById("phoneSpan").innerText = "";
            validPhone = true;
        }
    }


    if(userEmail.value.length===0)
    {
        document.getElementById("emailSpan").innerText="Field can not be empty!";
        validEmail=false;
    }else{
        if(!isValidEmail(userEmail.value.toString()))
        {
            document.getElementById("emailSpan").innerText = "Invalid Email Address";
            validEmail = false;
        }else
        {
            document.getElementById("emailSpan").innerText = "";
            validEmail = true;
        }
    }


    if(userDepartment.value==="select")
    {
        document.getElementById("departmentSpan").innerText="Field can not be empty!";
        validDepartment=false;
    }else{

        document.getElementById("departmentSpan").innerText = "";
        validDepartment = true;
        }


    if(userPassword.value.length===0)
    {
        document.getElementById("passwordSpan").innerText="Field can not be empty!";
        validPassword=false;
    }else{
        if(!isValidPass(userPassword.value.toString()))
        {
            document.getElementById("passwordSpan").innerText = "number,capital,small and special charecter needed(length 8)";
            validPassword = false;
        }else{

            document.getElementById("passwordSpan").innerText = "";
            validPassword = true;
        }
    }
    if(userRepassword.value.length===0)
    {
        document.getElementById("rePasswordSpan").innerText="Field can not be empty!";
        validRepassword=false;
    }else{ 
        if(userRepassword.value!==userPassword.value)
        {
        document.getElementById("rePasswordSpan").innerText = "Password Missmatch";
        validRepassword =false;
        }
        else{

            document.getElementById("rePasswordSpan").innerText = "";
            validRepassword = true;
        }
        }



    if(!validId || !validPassword || !validRepassword || !validPhone || !validEmail || !validName || !validDepartment)
    {
        valid=false;
    }else
    {
        valid = true;
    }
            
    return valid;
}