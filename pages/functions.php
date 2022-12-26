<?php
    function show_cars($res,$type){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete='';
            if($type=="admin"){
                $delete ="<br><input type='button' value='Delete' onclick='deleteCar(event)'>";
            }
            else{
                $click="showForm(event,`reservation`)";
                $delete="<br><input type='button' value='Reserve' onclick='".$click."'>";
            }
            $html_res .= "<div id=".$row['plate_id']." class='car_div'><label class='car_model'>".$row['model'] .'</label>' 
            ."<label class='car_price'>".$row['price'] .'</label>' .$delete."</div><br>";
        }
        return $html_res;
    }
    function show_users($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' onclick='deleteUser(event)'>";
            $html_res .= "<div id=".$row['user_id']." class='user_div'><label class='user_name'>".$row['name'] .'</label>' 
            ."<label class='use_email'>".$row['email'] .'</label>' .$delete."</div><br>";
        }
        return $html_res;
    }
    function show_reservations($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' onclick='deleteReservation(event)'>";
            $html_res .= "<div id=".$row['reservation_number']." class='reservation_div'><label class='user_name'>".$row['name'] .'</label>' 
            ."<label class='use_email'>".$row['email'] .'</label>'."<label class='car_model'>".$row['model'] .'</label>' 
            ."<label class='car_price'>".$row['price'] .'</label>'."<label class='reservation_date'>".$row['reserve_date'] 
            .'</label>' .$delete."</div><br>";
        }
        return $html_res;
    }
    function show_reservations_customer($res){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete ="<br><input type='button' value='Delete' onclick='deleteReservation(event)'>";
            $html_res .= "<div id=".$row['reservation_number']." class='reservation_div'><label class='car_model'>".$row['model'] .'</label>' 
            ."<label class='car_price'>".$row['price'] .'</label>'."<label class='reservation_date'>".$row['reserve_date'] 
            .'</label>' .$delete."</div><br>";
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
?>