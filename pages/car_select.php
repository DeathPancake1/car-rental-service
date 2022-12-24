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
?>