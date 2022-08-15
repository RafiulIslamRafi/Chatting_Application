<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../db.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_SESSION['selected_fr']); //change kora lagte pare
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .=  '<tr>
                                    <td style="text-align:right; padding: 1px;"  width=75%">
                                        <p style="text-align:right;" class="bg-success p-2 shadow-sm text-white float-right rounded-outgoing">'. $row['msg'] .'</p>
                                    </td>
                                    <td style="text-align:right;">'. $row['time'] .'</td>
                                </tr>';
                }else{
                    $output .= '<tr>
                                    <td width="75%" style=" padding: 1px;">
                                        <p class="bg-primary p-2 shadow-sm text-white float-left rounded-incoming">'. $row['msg'] .'</p>
                                    </td>
                                    <td style="text-align:right;">'. $row['time'] .'</td>
                                </tr>';
                }
            }
            
          
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>