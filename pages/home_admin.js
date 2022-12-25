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
function addcar(){
    var plate_id = document.forms["carForm"]["plate_id"].value;
    var status = document.forms["carForm"]["status"].value;
    var model = document.forms["carForm"]["model"].value;
    var year = document.forms["carForm"]["year"].value;
    var price = document.forms["carForm"]["price"].value;
    console.log(plate_id+model+year+price+status);
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            console.log(xmlhttp.responseText.trim());
            hideForm("addCarForm");
        }
    }
    var querystr="plate_id="+plate_id+"&model="+model+"&year="+year+"&price="+price+"&status="+status;
    xmlhttp.open("POST","car_select.php?f=carAdd",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function searchbystartend(){
    var startdate = document.getElementById("startdate").value;
    var enddate = document.getElementById("enddate").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultsreservationWPCC").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="startdate="+startdate+"&enddate="+enddate;
    xmlhttp.open("POST","car_select.php?f=searchbystartend",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}