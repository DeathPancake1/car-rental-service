function checkForm(){
    var email = document.forms["form"]["email"].value;
    var pass = document.forms["form"]["pass"].value;
    var cpass = document.forms["form"]["cpass"].value;
    var birth = document.forms["form"]["birth"].value;
    var lic = document.forms["form"]["lic"].value;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(birth=='' || email=='' || pass=='' || cpass=='' || lic=='' || !email.match(validRegex) || pass!=cpass){
        if(cpass==''){
            document.getElementById("error").innerHTML ="Please fill Confirm password";
        }
        if(pass==''){
            document.getElementById("error").innerHTML ="Please fill password";
        }
        if(email==''){
            document.getElementById("error").innerHTML ="Please fill email";
        }
        if(birth==''){
            document.getElementById("error").innerHTML ="Please fill Birthdate";
        } 
        if(lic==''){
            document.getElementById("error").innerHTML ="Please fill Licence";
        } 
        if(!email.match(validRegex)){
            document.getElementById("error").innerHTML ="Please fix email format";
        }
        if(pass!=cpass){
            document.getElementById("error").innerHTML ="Password not equal confirm pass";
        }
        return false;
    }else{

    }
}