<?php
    include ("functions.php");
    session_start();
    $user_name = $_SESSION['user_name'];
    $conn=mysqli_connect('127.0.0.1','root','','car_rental');
    $query="select `year`,plate_id,model,price from car where plate_id in (Select plate_id from car_status where `status`='active'
    and today in(select MAX(today) from car_status where today<=NOW() GROUP by plate_id) group by plate_id)";
    $res=$conn->query($query);
    $html_res=show_cars($res,"user");
    
?>
<!DOCTYPE html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="cars.css">
    <link rel="stylesheet" href="home_admin.css">
</head>

<body>
<div id="bg"></div>
    <div id="reservation" style="
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
        <form id="reservationForm" method="POST">
            <button class="close" onclick="hideForm('reservation')"></button>
            <label>Pickup date:</label>
            <input name="pickup_date" type="text" required><br>
            <label>Return date:</label>
            <input name="return_date" type="text" required><br>
            <input type="button" onclick="reserveCar()" value="Reserve">
            <label id="reserve_result"></label>
        </form>
    </div>
    <div id="payment" style="
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
        <form id="paymentForm" method="POST">
            <button class="close" onclick="hideForm('payment')"></button>
            <label>Payment Method:</label>
            <input name="method" type="text" required><br>
            <div id="payment_result"></div>
        </form>
    </div>
    <div class="label">
        <img src="../Profile-PNG-Clipart.png" width="40" height="35" class="image">
        <label id='user_id'><?php echo $user_name; ?></label>
    </div>

    <div class="search">
        <input type='text'class="fields" name='search' placeholder='search' id="search_bar">
        <!-- <img src="../download.png" width="40" height="35" class="image" onclick="carSearch()"> -->
        <input type="button" value='go'class="button" onclick="carSearch()">
        <input type="button" value='Pay'class="button" onclick="showForm(event,'payment');showRes()">
    </div>

    <div class="logout">
        <a href='logout.php'>Logout</a><br>
    </div>

    <div id="cars"><?php echo $html_res; ?></div>

    <script src='home.js'></script>
</body>