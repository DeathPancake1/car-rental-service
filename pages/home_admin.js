function carSearch(){
    var search_bar = document.getElementById("search_bar").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("results").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="search="+search_bar;
    xmlhttp.open("POST","car_select.php?f=searchCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function deleteCar(e){
    e = e || window.event;
    var elem_id=e.target.parentElement.id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById(elem_id).remove();
        }
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=deleteCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function userSearch(){
    var search_bar = document.getElementById("search_bar").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("results").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="search="+search_bar;
    xmlhttp.open("POST","car_select.php?f=searchUser",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function deleteUser(e){
    e = e || window.event;
    var elem_id=e.target.parentElement.id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById(elem_id).remove();
        }
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=deleteUser",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function reservationSearch(){
    var search_bar = document.getElementById("search_bar").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("results").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="search="+search_bar;
    xmlhttp.open("POST","car_select.php?f=searchReservation",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function showForm(id){
    var element = document.getElementById(id);
    element.style.display="block";
}
function hideForm(id){
    var element = document.getElementById(id);
    element.style.display="none";
}