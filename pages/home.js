var car_id;
function carsearch(){
    var search_bar = document.getElementById("searchBar").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("results").innerHTML=xmlhttp.responseText.trim();
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
function showFormUser(plate_id,id){
    car_id=plate_id;
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
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            var result=xmlhttp.responseText.trim();
            if(result!=""){
                document.getElementById("reserve_result").innerHTML=result;
            }else{
                hideForm("reservation");
            }
        }
    }
    var querystr="id="+car_id+"&pickup_date="+pickup_date+"&return_date="+return_date;
    xmlhttp.open("POST","car_select.php?f=reserveCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function showRes(){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("payment_result").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="";
    xmlhttp.open("POST","car_select.php?f=show_my_reservations",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function pay(e){
    e = e || window.event;
    var reservation_number=e.target.parentElement.id;
    var method = document.forms["paymentForm"]["method"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            hideForm("payment");
        }
    }
    var querystr="method="+method+"&reservation_number="+reservation_number;
    xmlhttp.open("POST","car_select.php?f=payCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function showUserCar(e){
    e = e || window.event;
    var elem_id=e.target.parentElement.id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById('showCar').style.display='block';
            document.getElementById('showCar').innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=searchCarByPlateID&u=user",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}