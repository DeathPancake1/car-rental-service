function checkForm(){
    var name = document.forms["register_form"]["name"].value;
    var email = document.forms["register_form"]["email"].value;
    var pass = document.forms["register_form"]["pass"].value;
    var cpass = document.forms["register_form"]["cpass"].value;
    var birth = document.forms["register_form"]["birth"].value;
    var lic = document.forms["register_form"]["lic"].value;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(name=='')
    {
        document.getElementById("error").innerHTML ="Please enter your name"; 
        return false;
    }
    else if(email==''){
        document.getElementById("error").innerHTML ="Please fill email";
        return false;
    }
    else if(pass==''){
        document.getElementById("error").innerHTML ="Please fill password";
        return false;
    }
    else if(cpass==''){
        document.getElementById("error").innerHTML ="Please fill Confirm password";
        return false;
    }
    else if(birth==''){
        document.getElementById("error").innerHTML ="Please fill Birthdate";
        return false;
    } 
    else if(lic==''){
        document.getElementById("error").innerHTML ="Please fill Licence";
        return false;
    } 
    else if(!email.match(validRegex)){
        document.getElementById("error").innerHTML ="Please fix email format";
        return false;
    }
    else if(pass!=cpass){
        document.getElementById("error").innerHTML ="Password not equal confirm pass";
        return false;
    }
    
    else{
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState == 4 ) {
                if ( xmlhttp.responseText.trim() == 'wrong' ){
                    document.getElementById("error").innerHTML="This email already exists.";
                }
                else if(  xmlhttp.responseText.trim() == 'zy el fol' ){
                    document.getElementById("error").innerHTML="enta ragl zo2lot w user w ntn";
                }
                else { console.log(xmlhttp.responseText.trim());}
            }
        }


        var querystr="name=" + name + "&email=" + email + "&pass=" + pass +"&birth=" + birth + "&lic=" + lic ;
        console.log(querystr);
        xmlhttp.open("POST","reg_connection.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(querystr);
        return false;
    }

    }       