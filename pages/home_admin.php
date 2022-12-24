<?php
    include ("functions.php");
    session_start();
    $admin_name = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <label id='user_id'><?php echo $admin_name; ?></label>
    <input type='text' name='search' placeholder='search' id="search_bar">
    <input type="button" value='Add Car' onclick="carSearch()">
    <input type="button" value='Reservation Within Period (Car and Customer)' onclick="carSearch()">
    <input type="button" value='Reservation Within Period (Customer)' onclick="carSearch()">
    <input type="button" value='Car Status on a day' onclick="carSearch()">
    <input type="button" value='Reservation of Customer' onclick="carSearch()">
    <input type="button" value='Daily Payments' onclick="carSearch()">
    <a href='logout.php'>Logout</a><br>
    <input type="button" value='Car Search' onclick="carSearch()">
    <input type="button" value='User Search' onclick="userSearch()">
    <input type="button" value='Reservation Search' onclick="carSearch()">
    <br>
    <div id="results"></div>
</body>
<script src='home_admin.js'></script>
</html>