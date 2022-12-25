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
    <title>Home</title>
    <link rel="stylesheet" href="home.css">

</head>

<body>
<div id="bg"></div>
    <div class="label">
        <img src="../Profile-PNG-Clipart.png" width="40" height="35" class="image">
        <label id='user_id'><?php echo $user_name; ?></label>
    </div>

    <div class="search">
        <input type='text'class="fields" name='search' placeholder='search' id="search_bar">
        <!-- <img src="../download.png" width="40" height="35" class="image" onclick="carSearch()"> -->
        <input type="button" value='go'class="button" onclick="carSearch()">
    </div>

    <div class="logout">
        <a href='logout.php'>Logout</a><br>
    </div>

    <div id="cars"><?php echo $html_res; ?></div>

</body>
<script src='home.js'></script>
<style></style>