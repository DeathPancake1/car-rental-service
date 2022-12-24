<?php
    include ("functions.php");
    session_start();
    $user_name = $_SESSION['user_name'];
    $conn=mysqli_connect('127.0.0.1','root','','car_rental');
    $query="select * from car ORDER BY model DESC";
    $res=$conn->query($query);
    $html_res=show_cars($res,"user");
    
?>
<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<body>
    <label id='user_id'><?php echo $user_name; ?></label>
    <input type='text' name='search' placeholder='search' id="search_bar">
    <input type="button" value='go' onclick="carSearch()">
    <a href='logout.php'>Logout</a><br>
    <div id="cars"><?php echo $html_res; ?></div>
</body>
<script src='home.js'></script>
<style></style>