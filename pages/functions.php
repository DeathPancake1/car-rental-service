<?php
    function show_cars($res,$type){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete='';
            if($type=="admin"){
                $delete ="<br><input type='button' value='Show car' class='car_action' onclick='showAdminCar(event)'>";
            }
            else{
                $click="showUserCar(event)";
                $delete="<br><input type='button' value='Show car' class='car_action' onclick='".$click."'>";
            }
            $html_res .= "<div id=".$row['plate_id']." class='car_div'>".
                            "<img class='car_img' src='../car_images/".$row['plate_id'].".png'/>".
                            "<div>".
                                "<label class='car_model car_label_value'>".$row['model'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_label'>"."Price:" .'</label>'.
                                "<label class='car_price car_label_value'>".$row['price'] ."LE".'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_car($res,$type){
        $html_res = "";
        $delete='';
        if($type=="admin"){
            $delete ="<br><input type='button' value='Delete' class='car_action' onclick='deleteCarPlateId(".$res['plate_id'].")'>";
        }
        else{
            $click="hideForm(`showCar`);showFormUser(".$res['plate_id'].",`reservation`);";
            $delete="<br><input type='button' value='Reserve' class='car_action' onclick='".$click."'>";
        }
        $html_res .= "<div id=".$res['plate_id']." class='car_div'>".
                            "<button class='close' onclick='hideForm(`showCar`)'></button>".
                            "<img class='car_img' src='../car_images/".$res['plate_id'].".png'/>".
                            "<div id='plateDiv'>".
                                "<label class='car_label'>"."Plate ID:" .'</label>'.
                                "<label class='car_plate_id car_label_value'>".$res['plate_id'] .'</label>'.
                            "</div>".
                            "<div id='yearDiv'>".
                                "<label class='car_label'>"."Year:" .'</label>'.
                                "<label class='car_year car_label_value'>".$res['year'] .'</label>'.
                            "</div>".
                            "<div id='modelDiv'>".
                                "<label class='car_label'>"."Model:" .'</label>'.
                                "<label class='car_model car_label_value'>".$res['model'] .'</label>'.
                            "</div>".
                            "<div id='priceDiv'>".
                                "<label class='car_label'>"."Price:" .'</label>'.
                                "<label class='car_price car_label_value'>".$res['price'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        return $html_res;
    }
    function show_users($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' class='user_action' onclick='deleteUser(event)'>";
            $html_res .= "<div id=".$row['user_id']." class='user_div'>".
                            "<img class='user_img' src='../user_images/".$row['user_id'].".png'/>".
                            "<div>".
                                "<label class='user_label'>"."User Name" .'</label><br>'.
                                "<label class='user_name user_label_value'>".$row['name'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='user_label'>"."Email" .'</label><br>'.
                                "<label class='user_email user_label_value'>".$row['email'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='user_label'>"."User ID" .'</label><br>'.
                                "<label class='user_id user_label_value'>".$row['user_id'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_reservations($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' class='reservation_action' onclick='deleteReservation(event)'>";
            $html_res .= "<div id=".$row['reservation_number']." class='reservation_div'>".
                            "<div>".
                                "<label class='reservation_label'>"."User Name" .'</label><br>'.
                                "<label class='reservation_name reservation_label_value'>".$row['name'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Email" .'</label><br>'.
                                "<label class='reservation_email reservation_label_value'>".$row['email'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."User ID" .'</label><br>'.
                                "<label class='reservation_id reservation_label_value'>".$row['user_id'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Plate ID" .'</label><br>'.
                                "<label class='reservation_plate_id reservation_label_value'>".$row['plate_id'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Year" .'</label><br>'.
                                "<label class='reservation_year reservation_label_value'>".$row['year'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Model" .'</label><br>'.
                                "<label class='reservation_model reservation_label_value'>".$row['model'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Price" .'</label><br>'.
                                "<label class='reservation_price reservation_label_value'>".$row['price'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Return Date" .'</label><br>'.
                                "<label class='reservation_return_date reservation_label_value'>".$row['return_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Pickup Date" .'</label><br>'.
                                "<label class='reservation_pickup_date reservation_label_value'>".$row['pickup_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Reservation Date" .'</label><br>'.
                                "<label class='reservation_date reservation_label_value'>".$row['reserve_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Reservation Number" .'</label><br>'.
                                "<label class='reservation_number reservation_label_value'>".$row['reservation_number'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_reservations_customer($res,$type){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete='';
            if($type=="admin"){
                $delete ="<br><input type='button' value='Delete' class='reservation_action' onclick='deleteReservation(event)'>";
            }
            else{
                $click="pay(event)";
                $delete="<br><input type='button' value='Pay' class='reservation_action' onclick='".$click."'>";
            }
            $html_res .= "<div id=".$row['reservation_number']." class='reservation_div'>".
                            "<div>".
                                "<label class='reservation_label'>"."Plate ID" .'</label><br>'.
                                "<label class='reservation_plate_id reservation_label_value'>".$row['plate_id'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Year" .'</label><br>'.
                                "<label class='reservation_year reservation_label_value'>".$row['year'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Model" .'</label><br>'.
                                "<label class='reservation_model reservation_label_value'>".$row['model'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Price" .'</label><br>'.
                                "<label class='reservation_price reservation_label_value'>".$row['price'] .'</label>'.
                            "</div>".
                            "<div>".
                            "<label class='reservation_label'>"."Return Date" .'</label><br>'.
                            "<label class='reservation_return_date reservation_label_value'>".$row['return_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Pickup Date" .'</label><br>'.
                                "<label class='reservation_pickup_date reservation_label_value'>".$row['pickup_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Reservation Date" .'</label><br>'.
                                "<label class='reservation_date reservation_label_value'>".$row['reserve_date'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='reservation_label'>"."Reservation Number" .'</label><br>'.
                                "<label class='reservation_number reservation_label_value'>".$row['reservation_number'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_car_status($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete="<br><input type='button' value='Delete' class='status_action' onclick='deleteCarStatus(event)'>";
            $html_res .= "<div id=".$row['plate_id']." class='car_status_div'>".
                            "<img class='car_status_img' src='../car_images/".$row['plate_id'].".png'/>".
                            "<div>".
                                "<label class='car_status_label'>"."Status" .'</label><br>'.
                                "<label class='car_status car_status_label_value'>".$row['status'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_status_label'>"."Plate ID" .'</label><br>'.
                                "<label class='car_status_plate_id car_status_label_value'>".$row['plate_id'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_status_label'>"."Year" .'</label><br>'.
                                "<label class='car_status_year car_status_label_value'>".$row['year'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_status_label'>"."Model" .'</label><br>'.
                                "<label class='car_status_model car_status_label_value'>".$row['model'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_status_label'>"."Price" .'</label><br>'.
                                "<label class='car_status_price car_status_label_value'>".$row['price'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_status_label'>"."Reserved" .'</label><br>'.
                                "<label class='car_status_reserved car_status_label_value'>".$row['reserved'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_payments($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $html_res .= "<div class='payment_div'>".
                            "<div>".
                                "<label class='payment_label'>"."Payment Date" .'</label><br>'.
                                "<label class='payment_date payment_label_value'>".$row['payment_time'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='payment_label'>"."Amount" .'</label><br>'.
                                "<label class='payment_amount payment_label_value'>".$row['amount'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='payment_label'>"."Method" .'</label><br>'.
                                "<label class='payment_method payment_label_value'>".$row['method'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='payment_label'>"."Reservation Number" .'</label><br>'.
                                "<label class='payment_reservation_number payment_label_value'>".$row['reservation_number'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='payment_label'>"."User ID" .'</label><br>'.
                                "<label class='payment_user_id payment_label_value'>".$row['user_id'].'</label>'.
                            "</div>".
                        "</div><br>";
        }
        return $html_res;
    }
?>