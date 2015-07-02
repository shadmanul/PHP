function rePass(){
    if(document.getElementById("password").value != document.getElementById("repass").value ){
        document.getElementById("vrepass").innerHTML = "Password didn't match";
    }
    else{
        document.getElementById("vrepass").innerHTML = "";
    }
}