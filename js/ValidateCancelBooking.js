
var valid =true;
function cancelValidate() {

    var reason = document.getElementById("reason");

    if(reason.value.length===0){
        document.getElementById("reasonSpan").innerText = "Please Fill Up This Section!";
        valid = false;
    }else {


        document.getElementById("reasonSpan").innerText = " ";
        valid = true;

    }

    if(!valid){

        return false;
    }else
        return true;

}