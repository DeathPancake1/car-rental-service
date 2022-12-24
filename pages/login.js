
function print(){
    var form=document.getElementById("loginform");
    var email=form.elements[0].value;
    var password=form.elements[1].value;
    console.log(email);
    console.log(password);
}
function validateForm(){
    var emailReg= /^\w+([\.-]?\w+)*@\w+(-?\w+)*(\.\w{2,3})+$/;
    var emailjs=document.forms['loginform']['email'].value;
    var passjs=document.forms['loginform']['password'].value;
    if(emailjs===""){
        document.getElementById("mailm").innerHTML="You must enter an email";
        return false;
    }
    else if(!emailReg.test(emailjs)){
        document.getElementById("mailm").innerHTML="You must enter a valid email";
        return false;
    }
    else if(passjs===""){
        document.getElementById("mailm").innerHTML="You must enter a password";
        return false;
    }
    else{
        document.getElementById("mailm").innerHTML="";
        checkMail();
    }
}
function checkMail(){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        console.log(xmlhttp.responseText.trim());
        if (xmlhttp.readyState == 4 ) {
            if ( xmlhttp.responseText.trim() == 'wrong' ){
                document.getElementById("mailm").innerHTML="wrong email or password";
            }
            else if(  xmlhttp.responseText.trim() == 'admin' ){
                window.location.href="home_admin.php";
            }
            else if( xmlhttp.responseText.trim() == 'user' ){
                console.log("hello");
                window.location.href="home.php";
            }
        }
    }
    var form=document.getElementById("loginform");
    var email=form.elements[0].value;
    var password=form.elements[1].value;
    var querystr= "email=" + email + "&password=" + password;
    xmlhttp.open("POST","connection.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}