<?php
    include ("functions.php");
    $conn=mysqli_connect('127.0.0.1','root','','car_rental');
    $f = $_GET["f"];
    if($f=="deleteCar"){
        $id=$_POST['id'];
        $query="delete from car where plate_id='".$id."'";
        $res=$conn->query($query);
    }
    if($f=="searchCar"){
        $search=$_POST['search'];
        session_start();
        $query="select * from car where model='".$search."' or `year`='".$search."' or plate_id='".$search."' or price='".$search."'";
        $res=$conn->query($query);
        if(isset($_SESSION['admin_name'])){
            $html_res=show_cars($res,"admin");   
        }else{
            $html_res=show_cars($res,"user");  
        }
        echo $html_res;
    }
    if($f=="searchUser"){
        $search=$_POST['search'];
        $query="select * from user where user_id='".$search."' or `name`='".$search."' or email='".$search."' or birthdate='".$search."' or license='".$search."'";
        $res=$conn->query($query);
        $html_res=show_users($res);
        echo $html_res;
    }
    if($f=="deleteUser"){
        $id=$_POST['id'];
        $query="delete from user where user_id='".$id."'";
        $res=$conn->query($query);
    }
    if($f=="searchReservation"){
        $search=$_POST['search'];
        $query="select * from (reservation natural join user) natural join car where user_id='".$search."' 
        or `name`='".$search."' or email='".$search."' or birthdate='".$search."' or license='".$search."'
        or model='".$search."' or `year`='".$search."' or plate_id='".$search."' or price='".$search."'
        or reserve_date='".$search."'";
        $res=$conn->query($query);
        $html_res=show_reservations($res);
        echo $html_res;
    }
    if($f=="carAdd"){
        $plate_id=$_POST['plate_id'];
        $model=$_POST['model'];
        $year=$_POST['year'];
        $status=$_POST['status'];
        $price=$_POST['price'];
        echo $plate_id . $model . $year . $status . $price;
        $query="insert into car (plate_id,model,`year`,price) values('".$plate_id."','".$model."','".$year."','".$price."')";
        $query2="insert into car_status (plate_id,today,`status`,reserved) values('".$plate_id."',NOW(),'".$status."','NO')";
        $res=$conn->query($query);
        $res=$conn->query($query2);
    }
    if($f=="searchByStartEnd"){
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $query="select * from reservation natural join user natural join car where reserve_date between '".$startdate."' and '".$enddate."'";
        $res=$conn->query($query);
        $html_res=show_reservations($res);
        echo $html_res;
    }
    if($f=="deleteReservation"){
        $id=$_POST['id'];
        $query="delete from reservation where reservation_number='".$id."'";
        $res=$conn->query($query);
    }
    if($f=="searchByStartEndCustomer"){
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $query="select * from reservation natural join car where reserve_date between '".$startdate."' and '".$enddate."'";
        $res=$conn->query($query);
        $html_res=show_reservations_customer($res);
        echo $html_res;
    }
    if($f=="carStatusDay"){
        $day=$_POST['day'];
        $query="Select plate_id,reserved,Max(today),model,`year`,price,today from car_status natural join car where today<= '".$day."' GROUP by plate_id";
        $res=$conn->query($query);
        $html_res=show_car_status($res);
        echo $html_res;
    }
    if($f=="deleteStatus"){
        $id=$_POST['id'];
        $query="delete from car_status where plate_id='".$id."'";
        $res=$conn->query($query);
    }
    if($f=="customerReservation"){
        $id=$_POST['id'];
        $query="Select * from reservation natural join car natural join user where user_id= '".$id."'";
        $res=$conn->query($query);
        $html_res=show_reservations($res);
        echo $html_res;
    }
    if($f=="updateStatus"){
        $plate_id=$_POST['plate_id'];
        $reserved=$_POST['reserved'];
        $stat=$_POST['status'];
        $query="insert into car_status (plate_id,today,status,reserved) values ('".$plate_id."',NOW(),'".$stat."','".$reserved."')";
        $res=$conn->query($query);
    }
?>