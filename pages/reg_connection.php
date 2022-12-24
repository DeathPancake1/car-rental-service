<?php
    session_start();
    $conn=mysqli_connect('127.0.0.1','root','','car_rental');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $birthdate=$_POST['birth'];
    $license=$_POST['lic'];

    $query2="select * from user where email='".$email."'";
    $res=$conn->query($query2);
    $row2 = $res->fetch_assoc();

    if($row2 !=NULL){
        echo "wrong";
    }
    else {$query = "insert into user (name,email,password,birthdate,license) values ('".$name."','".$email."','".$password."','".$birthdate."','".$license."')";
        $res=$conn->query($query);
        $row = $res->fetch_assoc();
        echo "zy el fol";}

?>