<?php
    function show_cars($res,$type){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete='';
            if($type=="admin"){
                $delete ="<br><input type='button' value='Delete' class='car_action' onclick='deleteCar(event)'>";
            }
            else{
                $click="showForm(event,`reservation`)";
                $delete="<br><input type='button' value='Reserve' class='car_action' onclick='".$click."'>";
            }
            $html_res .= "<div id=".$row['plate_id']." class='car_div'>".
                            "<img class='car_img' src='../car_images/".$row['plate_id'].".png'/>".
                            "<div>".
                                "<label class='car_label'>"."Plate ID" .'</label><br>'.
                                "<label class='car_plate_id car_label_value'>".$row['plate_id'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_label'>"."Year" .'</label><br>'.
                                "<label class='car_year car_label_value'>".$row['year'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_label'>"."Model" .'</label><br>'.
                                "<label class='car_model car_label_value'>".$row['model'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='car_label'>"."Price" .'</label><br>'.
                                "<label class='car_price car_label_value'>".$row['price'] .'</label>'.
                            "</div>".
                $delete."</div><br>";
        }
        return $html_res;
    }
    function show_users($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' class='user_action' onclick='deleteUser(event)'>";
            $html_res .= "<div id=".$row['user_id']." class='user_div'>".
                            "<div>".
                                "<label class='user_label'>"."User Name" .'</label><br>'.
                                "<label class='user_name'>".$row['name'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='user_label'>"."Email" .'</label><br>'.
                                "<label class='user_email'>".$row['email'] .'</label>'.
                            "</div>".
                            "<div>".
                                "<label class='user_label'>"."User ID" .'</label><br>'.
                                "<label class='user_id'>".$row['user_id'] .'</label>'.
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
                            "<img class='reservation_img' src='../car_images/".$row['plate_id'].".png'/>".
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
    function show_reservations($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' class='reservation_action' onclick='deleteReservation(event)'>";
            $html_res .= "<div id=".$row['reservation_number']." class='reservation_div'>".
                            "<img class='reservation_img' src='../car_images/".$row['plate_id'].".png'/>".
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
            $delete ="<br><input type='button' value='Delete' onclick='deleteCarStatus(event)'>";
            $html_res .= "<div id=".$row['plate_id']." class='car_status_div'><label class='status_date'>".$row['today'] .'</label>' 
            ."<label class='car_price'>".$row['price'] .'</label>'."<label class='car_model'>".$row['model'] 
            .'</label>'."<label class='status_reserved'>".$row['reserved'] 
            .'</label>' .$delete."</div><br>";
        }
        return $html_res;
    }
    function show_payments($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $html_res .= "<div class='payment_div'><label class='payment_date'>".$row['payment_time'] .'</label>' 
            ."<label class='payment_amount'>".$row['amount'] .'</label>'."<label class='payment_method'>".$row['method'] 
            .'</label>'."<label class='payment_reservation_number'>".$row['reservation_number'] 
            .'</label>' ."<label class='payment_user_id'>".$row['user_id'] 
            .'</label>'."</div><br>";
        }
        return $html_res;
    }
?>