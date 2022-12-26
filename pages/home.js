var car_id;
function carSearch(){
    var search_bar = document.getElementById("search_bar").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("cars").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="search="+search_bar;
    xmlhttp.open("POST","car_select.php?f=searchCar&u=user",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function showForm(e,id){
    e = e || window.event;
    car_id=e.target.parentElement.id;
    var element = document.getElementById(id);
    element.style.display="block";
}
function hideForm(id){
    var element = document.getElementById(id);
    element.style.display="none";
}
function reserveCar(){
    var pickup_date = document.forms["reservationForm"]["pickup_date"].value;
    var return_date = document.forms["reservationForm"]["return_date"].value;
    var reserve_date = document.forms["reservationForm"]["reserve_date"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            hideForm("reservation");
            document.getElementById(car_id).remove();
        }
    }
    var querystr="id="+car_id+"&reserve_date="+reserve_date+"&pickup_date="+pickup_date+"&return_date="+return_date;
    xmlhttp.open("POST","car_select.php?f=reserveCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}