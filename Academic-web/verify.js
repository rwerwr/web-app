
function verify(){
var user = "admin";
var password ="HOS&VC@EAMU123"
var user_field = document.getElementById("user")
var pass_field = document.getElementById("pass")
    if (user_field == user && pass_field == password){
        window.location.href = "func.html"
    }
    else{
        alert("Wrong password")
    }
}