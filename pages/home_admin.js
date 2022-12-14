function carSearch(){
    var search_bar = document.getElementById("mainsearch").value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("results").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="search="+search_bar;
    xmlhttp.open("POST","car_select.php?f=searchCar&u=admin",true);
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
function deleteCarPlateId(plate_id){
    var elem_id=plate_id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
            document.getElementById(elem_id).remove();
            document.getElementById('showCar').style="none";
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=deleteCar",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function showAdminCar(e){
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
    xmlhttp.open("POST","car_select.php?f=searchCarByPlateID&u=admin",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function userSearch(){
    var search_bar = document.getElementById("mainsearch").value;
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
    var search_bar = document.getElementById("mainsearch").value;
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
function deleteReservation(e){
    e = e || window.event;
    var elem_id=e.target.parentElement.id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            console.log(xmlhttp.responseText.trim());
            document.getElementById(elem_id).remove();
        }
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=deleteReservation",true);
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
    if(plate_id=="" || status=="" || model=="" || year=="" || price==""){
        return false;
    }else if(status != "active" && status!="out of service"){
        console.log("active or out of service");
        return;
    }
    else{
        console.log(plate_id+model+year+price+status);
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState == 4 ) {
                if(xmlhttp.responseText.trim()=="Already inserted"){
                    console.log(xmlhttp.responseText.trim());
                }else{
                    hideForm("addCarForm");
                }
            }
        }
        var querystr="plate_id="+plate_id+"&model="+model+"&year="+year+"&price="+price+"&status="+status;
        xmlhttp.open("POST","car_select.php?f=carAdd",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(querystr);
    }
}
function searchByStartEnd(){
    var startdate = document.forms["reservationCCForm"]["startdate"].value;
    var enddate = document.forms["reservationCCForm"]["enddate"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultsreservationWPCC").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="startdate="+startdate+"&enddate="+enddate;
    xmlhttp.open("POST","car_select.php?f=searchByStartEnd",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function searchByStartEndCustomer(){
    var startdate = document.forms["reservationCForm"]["startdate"].value;
    var enddate = document.forms["reservationCForm"]["enddate"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultsreservationWPC").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="startdate="+startdate+"&enddate="+enddate;
    xmlhttp.open("POST","car_select.php?f=searchByStartEndCustomer",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function carStatusDay(){
    var day = document.forms["carStatusForm"]["day"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultCarStatus").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="day="+day;
    xmlhttp.open("POST","car_select.php?f=carStatusDay",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function deleteCarStatus(){
    e = e || window.event;
    var elem_id=e.target.parentElement.id;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById(elem_id).remove();
        }
    }
    var querystr="id="+elem_id;
    xmlhttp.open("POST","car_select.php?f=deleteStatus",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function customerReservation(){
    var id = document.forms["customerReservationForm"]["customer_id"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultCustomerReservation").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="id="+id;
    xmlhttp.open("POST","car_select.php?f=customerReservation",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function updateStatus(){
    var status = document.forms["updateStatusForm"]["status"].value;
    var reserved = document.forms["updateStatusForm"]["reserved"].value;
    var plate_id = document.forms["updateStatusForm"]["plate_id"].value;
    if(status == "" || reserved =="" || plate_id==""){
        console.log("Insert Correct info");
        return;
    }
    if(status != "active" && status!="out of service"){
        console.log("active or out of service");
        return;
    }
    if(reserved != "NO" && reserved!="YES"){
        console.log("YES or NO");
        return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            console.log(xmlhttp.responseText.trim());
            hideForm("updateStatus");
        }
    }
    var querystr="status="+status+"&reserved="+reserved+"&plate_id="+plate_id;
    xmlhttp.open("POST","car_select.php?f=updateStatus",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}
function dailyPayments(){
    var startdate = document.forms["dailyPaymentsForm"]["startdate"].value;
    var enddate = document.forms["dailyPaymentsForm"]["enddate"].value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 ) {
            document.getElementById("resultDailyPayments").innerHTML=xmlhttp.responseText.trim();
        }
    }
    var querystr="startdate="+startdate+"&enddate="+enddate;
    xmlhttp.open("POST","car_select.php?f=dailyPayments",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(querystr);
}