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
    <div id="reservationWPCC" style="
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
        <form id="reservationCCForm">
            <div onclick="hideForm('reservationWPCC')">X</div>
            <form>
            <label>start date:</label>
            <input name="startdate" type="text" required><br>
            <label>end date:</label>
            <input name="enddate" type="text" required><br>
            <input type="button" onclick="searchByStartEnd()" value="search">
            <div id="resultsreservationWPCC"></div>
            </form>
        </form>
    </div>
    <div id="reservationWPC" style="
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
        <form id="reservationCForm">
            <div onclick="hideForm('reservationWPC')">X</div>
            <form>
            <label>start date:</label>
            <input name="startdate" type="text" required><br>
            <label>end date:</label>
            <input name="enddate" type="text" required><br>
            <input type="button" onclick="searchByStartEndCustomer()" value="search">
            <div id="resultsreservationWPC"></div>
            </form>
        </form>
    </div>
    <div id="carStatus" style="
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
        <form id="carStatusForm">
            <div onclick="hideForm('carStatus')">X</div>
            <form>
            <label>Date:</label>
            <input name="day" type="text" required><br>
            <input type="button" onclick="carStatusDay()" value="search">
            <div id="resultCarStatus"></div>
            </form>
        </form>
    </div>
    <div id="customerReservation" style="
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
        <form id="customerReservationForm">
            <div onclick="hideForm('customerReservation')">X</div>
            <form>
            <label>Customer ID:</label>
            <input name="customer_id" type="text" required><br>
            <input type="button" onclick="customerReservation()" value="search">
            <div id="resultCustomerReservation"></div>
            </form>
        </form>
    </div>
    <div id="updateStatus" style="
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
        <form id="updateStatusForm">
            <div onclick="hideForm('updateStatusForm')">X</div>
            <form>
            <label>Plate ID:</label>
            <input name="plate_id" type="text" required><br>
            <label>Status:</label>
            <input name="status" type="text" required><br>
            <label>Reserved:</label>
            <input name="reserved" type="text" required><br>
            <input type="button" onclick="updateStatus()" value="Update">
            <div id="resultUpdateStatus"></div>
            </form>
        </form>
    </div>
    <label id='user_id'><?php echo $admin_name; ?></label>
    <input type='text' name='search' placeholder='search' id="search_bar">
    <input type="button" value='Add Car' onclick="showForm('addCarForm')">
    <input type="button" value='Reservation Within Period (Car and Customer)' onclick="showForm('reservationWPCC')">
    <input type="button" value='Reservation Within Period (Customer)' onclick="showForm('reservationWPC')">
    <input type="button" value='Car Status on a day' onclick="showForm('carStatus')">
    <input type="button" value='Reservation of Customer' onclick="showForm('customerReservation')">
    <input type="button" value='Update Car Status' onclick="showForm('updateStatus')">
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