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
        $u = $_GET['u'];
        if($u=="admin"){
            $query="select * from car where model='".$search."' or `year`='".$search."' or plate_id='".$search."' or price='".$search."'";
            $res=$conn->query($query);
            $html_res=show_cars($res,"admin");   
        }else{
            $query="select `year`,plate_id,model,price from car where (model='".$search."' or `year`='".$search."' 
            or plate_id='".$search."' or price='".$search."') and plate_id in (Select plate_id from car_status where `status`='active'
            and today in(select MAX(today) from car_status where today<=NOW() GROUP by plate_id) group by plate_id)";
            $res=$conn->query($query);
            $html_res=show_cars($res,"user");  
        }
        echo $html_res;
    }
    if($f=="searchCarByPlateID"){
        $id=$_POST['id'];
        $u = $_GET["u"];
        if($u=="admin"){
            $query="select * from car where plate_id='".$id."'";
            $res=$conn->query($query);
            $res=$res->fetch_assoc();  
            $html_res=show_car($res,'admin');  
        }else{
            $query="select `year`,plate_id,model,price from car where plate_id='".$id."' and plate_id in (Select plate_id from car_status where `status`='active'
            and today in(select MAX(today) from car_status where today<=NOW() GROUP by plate_id) group by plate_id)";
            $res=$conn->query($query);
            $res=$res->fetch_assoc();  
            $html_res=show_car($res,'user');
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
        $query="select * from ((reservation natural join user) natural join car) natural join reserve_status where user_id='".$search."' 
        or `name`='".$search."' or email='".$search."' or birthdate='".$search."' or license='".$search."'
        or model='".$search."' or `year`='".$search."' or plate_id='".$search."' or price='".$search."'
        or reserve_date='".$search."' or pickup_date='".$search."' or return_date='".$search."' or reservation_number='".$search."'";
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
        $query="select * from reservation natural join user natural join car natural join reserve_status where reserve_date between 
        '".$startdate."' and '".$enddate."'";
        $res=$conn->query($query);
        $html_res=show_reservations($res);
        echo $html_res;
    }
    if($f=="deleteReservation"){
        $id=$_POST['id'];
        $query0="select plate_id from reservation where reservation_number='".$id."'";
        $res0=$conn->query($query0);
        $row = $res0->fetch_assoc();
        $plate_id = $row['plate_id'];
        $query0="select pickup_date,return_date from reserve_status where reservation_number='".$id."'";
        $res0=$conn->query($query0);
        $row = $res0->fetch_assoc();
        $pickup_date = $row['pickup_date'];
        $return_date = $row['return_date'];
        $query3="delete from car_status where plate_id='".$plate_id."' and today in ('".$pickup_date."','".$return_date."')";
        $res3=$conn->query($query3);
        $query="delete from reservation where reservation_number='".$id."'";
        $res1=$conn->query($query);
    }
    if($f=="searchByStartEndCustomer"){
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $query="select * from reservation natural join car natural join reserve_status where reserve_date between '".$startdate."' and '".$enddate."'";
        $res=$conn->query($query);
        $html_res=show_reservations_customer($res,"admin");
        echo $html_res;
    }
    if($f=="carStatusDay"){
        $day=$_POST['day'];
        $query="Select plate_id,reserved,`status`,model,price,`year` from car_status natural join car where today 
        in(select MAX(today) from car_status where today<='".$day."' GROUP by plate_id) group by plate_id";
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
        $query="Select * from reservation natural join car natural join user natural join reserve_status where user_id= '".$id."'";
        $res=$conn->query($query);
        $html_res=show_reservations_customer($res,"admin");
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
        $user_id = $_SESSION['user_id'];
        $pickup_date=$_POST['pickup_date'];
        $return_date=$_POST['return_date'];
        $car_id=$_POST['id'];
        $query0="select reservation_number from reserve_status where plate_id='".$car_id."' and ((pickup_date between '".$pickup_date."' and '".$return_date."')
        or (return_date between '".$pickup_date."' and '".$return_date."'))";
        $res_check = $conn->query($query0);
        $row_check = $res_check->fetch_assoc();
        if($row_check == ""){
            $query="Insert into reservation (reserve_date,user_id,plate_id) 
            values(NOW(),'".$user_id."','".$car_id."')";
            $query2="insert into car_status (plate_id,today,status,reserved) values ('".$car_id."','".$pickup_date."','active','YES')";
            $query3="insert into car_status (plate_id,today,status,reserved) values ('".$car_id."','".$return_date."','active','NO')";
            $res=$conn->query($query);
            $res2=$conn->query($query2);
            $res3=$conn->query($query3);
            $query5="insert into reserve_status values ('".$car_id."',
            (select reservation_number from reservation where user_id='".$user_id."' and plate_id='".$car_id."' order by reserve_date desc limit 1),
            '".$pickup_date."','".$return_date."')";
            $res5=$conn->query($query5);
            echo "";
        }
        else{
            echo "There is a reservation in this time interval";
        }
    }
    if($f=="show_my_reservations"){
        session_start();
        $user_id=$_SESSION['user_id'];
        $query="select * from reservation natural join car natural join reserve_status where user_id='".$user_id."' 
        and reservation_number not in (select reservation_number from payment);";
        $res=$conn->query($query);
        $html_res=show_reservations_customer($res,"user");
        echo $html_res;
    }
    if($f=="payCar"){
        session_start();
        $method=$_POST['method'];
        $reservation_number=$_POST['reservation_number'];
        $user_name=$_SESSION['user_name'];
        $query="select plate_id,user_id,return_date,pickup_date from reservation natural join reserve_status 
        where reservation_number='".$reservation_number."'";
        $res=$conn->query($query);
        $row = $res->fetch_assoc();
        $plate_id = $row['plate_id'];
        $user_id = $row['user_id'];
        $return_date = $row['return_date'];
        $pickup_date = $row['pickup_date'];
        $return_date = new DateTime($return_date);
        $pickup_date = new DateTime($pickup_date);
        $interval = $return_date->diff($pickup_date);
        $interval = $interval->d;
        if($interval==0){
            $interval = 1;
        }
        $query0="select price from car where plate_id='".$plate_id."'";
        $res=$conn->query($query0);
        $price = $res->fetch_assoc();
        $price = $price['price'];
        $query1="Insert into payment (reservation_number,user_id,payment_time,amount,method) values('".$reservation_number."',
        '".$user_id."',NOW(),".($interval*$price).",'".$method."')";
        $res2=$conn->query($query1);
        echo $res2;
    }
?>