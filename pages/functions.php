<?php
    function show_cars($res,$type){
        $html_res = "";
        while($row = mysqli_fetch_array($res)) {
            $delete='';
            if($type=="admin"){
                $delete ="<br><input type='button' value='Delete' onclick='deleteCar(event)'>";
            }
            $html_res .= "<div id=".$row['plate_id']." class='car_div'><label class='car_model'>".$row['model'] .'</label>' 
            ."<label class='car_price'>".$row['price'] .'</label>' .$delete."</div><br>";
        }
        return $html_res;
    }
?>