<?php
    $current = "";
    while($row = mysqli_fetch_assoc($query)){ 
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        if($_SESSION['selected_fr'] == $row['unique_id']) $current = "active";
        
        $last_massage_time = $row2['time'];
        $Temp_time1 = strtotime($last_massage_time);
        $time1 = date("h:i A", $Temp_time1);
        $date1 = date("d", $Temp_time1);
        $month1 = date("m", $Temp_time1);
        $year1 = date("y", $Temp_time1);

        $currentTime = date('Y-m-d H:i:s');
        $Temp_time2 = strtotime($currentTime);
        $date2 = date("d", ($Temp_time2));
        // $month2 = date("m", ($Temp_time2));
        $year2 = date("y", ($Temp_time2));

        $SevenDays_temp = strtotime('-7 days');

        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $finalTime = "";
        if($year1 != $year2){ //month year dekhabo
            $finalTime = $months[$month1 - 1] . " 20". $year1;
        }
        else if($date1 == $date2) $finalTime = $time1;
        else if($Temp_time1 > $SevenDays_temp){ //bar dekhabo
            $finalTime = strtoupper(date("D", $Temp_time1));
        }
        else{ //date month dekhabo
            $finalTime = $date1 . " " . $months[$month1 - 1];
        }

        $output .=   '<tr class="'.$current.'" role="button" onclick = "setSession('.$row['unique_id'].')">
                  <td><img src="images/'.$row['img'].'" alt="" class="profile-image rounded-circle"></td>
                  <td> '. $row['fname']. " " . $row['lname'] . " " .'<br> <small> '. $you . $msg .' </small></td>
                  <td><small>'. $finalTime .'</small></td>
                </tr>';
        $current = "";
    }
?>