var valid =true;

function checkDeptName(dept) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("deptSpan").innerHTML = this.responseText;
        }
    };
    valid = true;
    xhttp.open("GET", "../controller/DepartmentExist.php?dept="+dept, true);
    xhttp.send();
}


function isValidName(name){
    if(/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(name)){
        return true;
    }
    else{
        return false;
    }
}
function  validateFormDept() {

    var dept = document.getElementById("dept");
    var deptSpan = document.getElementById("deptSpan");

    if(dept.value.length===0){

        valid = false;
        deptSpan.innerText = "Please Enter a Department Name";
    }else{

        if(!isValidName(dept.value.toString())){
            valid = false;
            deptSpan.innerText = "Please Enter a Valid Name";
        }else{
            valid = true;
            deptSpan.innerText = " ";
        }
    }

    return valid;
}