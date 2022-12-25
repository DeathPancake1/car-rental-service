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
    <div id="addCarForm" style="
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 2;
        cursor: pointer;"
    >
        <form style="background-color:white;" id="carForm">
            <div onclick="hideForm('addCarForm')">X</div>
            <label>Plate ID:</label>
            <input type="text" name='plate_id' required><br>
            <label>Model:</label>
            <input type="text" name='model' required><br>
            <label>Year:</label>
            <input type="text" name='year' required><br>
            <label>Price:</label>
            <input type="text" name='price' required><br>
            <label>Status:</label>
            <input type="text" name='status' required><br>
            <input type="button" value='Add Car' onclick="addcar()">
        </form>
    </div>
    <label id='user_id'><?php echo $admin_name; ?></label>
    <input type='text' name='search' placeholder='search' id="search_bar">
    <input type="button" value='Add Car' onclick="showForm('addCarForm')">
    <input type="button" value='Reservation Within Period (Car and Customer)' onclick="carSearch()">
    <input type="button" value='Reservation Within Period (Customer)' onclick="carSearch()">
    <input type="button" value='Car Status on a day' onclick="carSearch()">
    <input type="button" value='Reservation of Customer' onclick="carSearch()">
    <input type="button" value='Daily Payments' onclick="carSearch()">
    <a href='logout.php'>Logout</a><br>
    <input type="button" value='Car Search' onclick="carSearch()">
    <input type="button" value='User Search' onclick="userSearch()">
    <input type="button" value='Reservation Search' onclick="reservationSearch()">
    <br>
    <div id="results"></div>
</body>
<script src='home_admin.js'></script>
</html>