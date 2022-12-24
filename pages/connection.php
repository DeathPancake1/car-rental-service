<?php
    session_start();
    $conn=mysqli_connect('127.0.0.1','root','','car_rental');
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password = md5($password);
    $query="select * from admin where email='".$email."' and password='".$password."'";
    $query2="select * from user where email='".$email."' and password='".$password."'";
    $res=$conn->query($query);
    $row = $res->fetch_assoc();
    $res2=$conn->query($query2);
    $row2 = $res2->fetch_assoc();
    if($row===NULL && $row2==NULL){
        echo "wrong";
    }
    else if($row!=NULL){
        echo "admin";
    }
    else if($row2!=NULL){
        echo "user";
    }
    if($row2){
        $_SESSION['user_name'] = $row2["name"];
    }
    if($row){
        $_SESSION['admin_name'] = $row["name"];
    }
 
?>
     