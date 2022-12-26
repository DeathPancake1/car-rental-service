<?php
    include ("functions.php");
    session_start();
    $admin_name = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="home_admin.css">
    <link rel="stylesheet" href="cars.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <div id="hidden_forms">
        <div id="addCarForm">
            <form id="carForm">
                <button class="close" onclick="hideForm('addCarForm')"></button>
                <div class='formdiv'>
                    <label>Plate ID:</label><br>
                    <input type="text" name='plate_id' required><br>
                    <label>Model:</label><br>
                    <input type="text" name='model' required><br>
                    <label>Year:</label><br>
                    <input type="text" name='year' required><br>
                    <label>Price:</label><br>
                    <input type="text" name='price' required><br>
                    <label>Status:</label><br>
                    <input type="text" name='status' required><br>
                <input class='formbtn' type="button" value='Add Car' onclick="addcar()">
                </div>
                
            </form>
        </div>
        <div id="reservationWPCC">
            <form id="reservationCCForm">
                <button class="close" onclick="hideForm('reservationWPCC')"></button>
                <div class="formdiv">
                    <label>start date:</label><br>
                    <input name="startdate" type="text" required><br>
                    <label>end date:</label><br>
                    <input name="enddate" type="text" required><br>
                    <input class='formbtn' type="button" onclick="searchByStartEnd()" value="search">
                </div>
                <div id="resultsreservationWPCC"></div>
            </form>
        </div>
        <div id="reservationWPC">
            <form id="reservationCForm">
                <button class="close" onclick="hideForm('reservationWPC')"></button>
                <div class="formdiv">
                    <label>start date:</label><br>
                    <input name="startdate" type="text" required><br>
                    <label>end date:</label><br>
                    <input name="enddate" type="text" required><br>
                    <input class='formbtn' type="button" onclick="searchByStartEndCustomer()" value="search">
                </div>
                <div id="resultsreservationWPC"></div>
                </form>
            </form>
        </div>
        <div id="carStatus">
            <form id="carStatusForm">
                <button class="close" onclick="hideForm('carStatus')"></button>
                <div class="formdiv">
                    <label>Date:</label><br>
                    <input name="day" type="text" required><br>
                    <input class='formbtn' type="button" onclick="carStatusDay()" value="search">
                </div>
                <div id="resultCarStatus"></div>
                </form>
            </form>
        </div>
        <div id="customerReservation">
            <form id="customerReservationForm">
                <button class="close" onclick="hideForm('customerReservation')"></button>
                <div class="formdiv">
                    <label>Customer ID:</label><br>
                    <input name="customer_id" type="text" required><br>
                    <input class='formbtn' type="button" onclick="customerReservation()" value="search">
                    <div id="resultCustomerReservation"></div>
                </div>
            </form>
        </div>
        <div id="updateStatus">
            <form id="updateStatusForm">
                <button class="close" onclick="hideForm('updateStatus')"></button>
                <div class="formdiv">
                    <label>Plate ID:</label><br>
                    <input name="plate_id" type="text" required><br>
                    <label>Status:</label><br>
                    <input name="status" type="text" required><br>
                    <label>Reserved:</label><br>
                    <input name="reserved" type="text" required><br>
                    <input class='formbtn' type="button" onclick="updateStatus()" value="Update">
                    <div id="resultUpdateStatus"></div>
                </div>
            </form>
        </div>
        <div id="dailyPayments">
            <form id="dailyPaymentsForm">
                <button class="close" onclick="hideForm('dailyPayments')"></button>
                <div class="formdiv">
                    <label>Start Date:</label><br> 
                    <input name="startdate" type="text" required><br> 
                    <label>End Date:</label><br> 
                    <input name="enddate" type="text" required><br>
                    <input class='formbtn' type="button" onclick="dailyPayments()" value="Search">
                    <div id="resultDailyPayments"></div>
                </div>
            </form>
        </div>
    </div>
    <h1 id='user_id'style='text-align:center;'><?php echo "Hello ".$admin_name; ?></h1>
    <div class="searchwith3buttons">
        <input type='text' id="mainsearch" name='search' placeholder='search'><br>
        <div id="searchbuttonsdiv">
            <input class="searchbuttons" type="button" value='Search for cars' onclick="carSearch()">
            <input class="searchbuttons" type="button" value='Search for user' onclick="userSearch()">
            <input class="searchbuttons" type="button" value='Search for reservations' onclick="reservationSearch()"><br>
        </div>
    </div>
    <h2 style="margin-left:0.4em;">For more functions:</h2><br>
    <div id="firstfourbutns">
        <input class="foursearch" type="button" value='Add Car' onclick="showForm('addCarForm')">
        <input class="foursearch" type="button" value='Reservation Within Period (Car and Customer)' onclick="showForm('reservationWPCC')">
        <input class="foursearch" type="button" value='Reservation Within Period (Customer only)' onclick="showForm('reservationWPC')">
        <input class="foursearch" type="button" value='Status of cars in a day' onclick="showForm('carStatus')">
    </div></br>
    <div class="searchwith3buttons">
        <input class="searchbuttons" type="button" value='Customer activity' onclick="showForm('customerReservation')">
        <input class="searchbuttons" type="button" value='Update Car Status' onclick="showForm('updateStatus')">
        <input class="searchbuttons" type="button" value='Daily Payments' onclick="showForm('dailyPayments')">
    </div>
    <div id="fooall">
        <h1 style="grid-area:x;text-align:center;color:white;">VROOM</h1>
        <a style="position:absolute;bottom:25%;grid-area:n;color:white;text-decoration:none;" href='logout.php'>Logout</a>

    </div>
    <br>
    <div id="results"></div>
</body>
<script src='home_admin.js'></script>
</html>