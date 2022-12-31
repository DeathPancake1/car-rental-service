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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="hidden_forms">
    <div id="showCar">
        
    </div>
    <div id="reservation">
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
    <div id="payment">
        <form id="paymentForm" method="POST">
            <button class="close" onclick="hideForm('payment')"></button>
            <label>Payment Method:</label>
            <input name="method" type="text" required><br>
            <div id="payment_result"></div>
        </form>
    </div>
</div>
<div id="navbar">
    <a class="label">
        <img src="../Profile-PNG-Clipart.png" width="40" height="35" class="image">
        <label id='user_id'><?php echo $user_name; ?></label>
    </a>
    <a id="searchBara"><input type='text' name='search' placeholder='Search' id="searchBar">
    <button onclick="carsearch()"><i class="fa fa-search"></i></button>
    </a>
    <a id="amgedid"><input type="button" value='Payments'class="btn" onclick="showForm(event,'payment');showRes()"></a>
    </div>
    <div id="results"><?php echo $html_res; ?></div>
    <div id="fooall" style="background: linear-gradient(90deg, rgba(67,66,78,1) 0%, rgba(48,46,71,1) 100%);">
        <h1 style="grid-area:x;text-align:center;color:white;">VROOM</h1>
        <a style="position:absolute;bottom:25%;grid-area:n;color:white;text-decoration:none;" href='logout.php'>Logout</a>
    </div>

    <script src='home.js'></script>
    <script src='home_admin.js'> </script>
</body>