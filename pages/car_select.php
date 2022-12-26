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
        $u = $_GET["u"];
        if($u=="admin"){
            $query="select * from car where model='".$search."' or `year`='".$search."' or plate_id='".$search."' or price='".$search."'";
            $res=$conn->query($query);
            $html_res=show_cars($res,"admin");   
        }else{
            $query="select `year`,plate_id,model,price from car where (model='".$search."' or `year`='".$search."' 
            or plate_id='".$search."' or price='".$search."') and plate_id in (Select plate_id from car_status where `status`='active' and reserved='NO'
            and today in(select MAX(today) from car_status GROUP by plate_id) group by plate_id)";
            $res=$conn->query($query);
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
        $query0="select plate_id from reservation where reservation_number='".$id."'";
        $res0=$conn->query($query0);
        $row = $res0->fetch_assoc();
        $row = $row['plate_id'];
        $query="delete from reservation where reservation_number='".$id."'";
        $res1=$conn->query($query);
        $query2="insert into car_status (plate_id,today,`status`,reserved) values('".$row."',NOW(),'active','NO')";
        $res2=$conn->query($query2); 
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
        $query="Select plate_id,reserved,`status`,model,price,`year` from car_status natural join car where today in(select MAX(today) from car_status where today<='".$day."' GROUP by plate_id) group by plate_id";
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
        $html_res=show_reservations_customer($res);
        echo $html_res;
    }
    if($f=="updateStatus"){
        $plate_id=$_POST['plate_id'];
        $reserved=$_POST['reserved'];
        $stat=$_POST['status'];
        $query="insert into car_status (plate_id,today,status,reserved) values ('".$plate_id."',NOW(),'".$stat."','".$reserved."')";
        $res=$conn->query($query);
    }
    if($f=="dailyPayments"){
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $query="select * from payment where payment_time between '".$startdate."' and '".$enddate."'";
        $res=$conn->query($query);
        $html_res=show_payments($res);
        echo $html_res;
    }
    if($f=="reserveCar"){
        session_start();
        $user_name=$_SESSION['user_name'];
        $qu = "Select user_id from user where name='".$user_name."'";
        $res=$conn->query($qu);
        $row = $res->fetch_assoc();
        $row = $row['user_id'];
        $pickup_date=$_POST['pickup_date'];
        $return_date=$_POST['return_date'];
        $reserve_date=$_POST['reserve_date'];
        $car_id=$_POST['id'];
        $query="Insert into reservation (reserve_date,pickup_date,return_date,user_id,plate_id) 
        values('".$reserve_date."','".$pickup_date."','".$return_date."','".$row."','".$car_id."')";
        $query2="insert into car_status (plate_id,today,status,reserved) values ('".$car_id."',NOW(),'active','YES')";
        $res=$conn->query($query);
        $res2=$conn->query($query2);
    }
    if($f=="payCar"){
        session_start();
        $method=$_POST['method'];
        $reservation_number=$_POST['reservation_number'];
        $user_name=$_SESSION['user_name'];
        $query="select plate_id,user_id from reservation where reservation_number='".$reservation_number."'";
        $res=$conn->query($query);
        $row = $res->fetch_assoc();
        $plate_id = $row['plate_id'];
        $user_id = $row['user_id'];
        echo $plate_id.$user_id;
        $query0="select price from car where plate_id='".$plate_id."'";
        $res=$conn->query($query0);
        $price = $res->fetch_assoc();
        $price = $price['price'];
        $query1="Insert into payment (reservation_number,user_id,payment_time,amount,method) values('".$reservation_number."',
        '".$user_id."',NOW(),'".$price."','".$method."')";
        $res2=$conn->query($query1);
    }
?>