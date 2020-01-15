	function LoginCheck() {
	var id = document.getElementById('id');
	var password = document.getElementById('password');
	var ValidId = true;
	var ValidPassword = true;
	

	if(id.value.length === 0){
		document.getElementById("idspan").innerText = "Field can not be empty!";
		ValidId = false;
	}
	if(password.value.length===0){

		document.getElementById("passwordspan").innerText = "Field can not be empty!";
		ValidPassword = false;

	}
	if(!ValidId || !ValidPassword){
		return false;
	}else return true;
		
}

