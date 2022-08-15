<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../db.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_SESSION['selected_fr']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO my_user_list (My_ID, Fr_list)
                                        VALUES ({$outgoing_id}, {$incoming_id})");
            
            $sql = mysqli_query($conn, "INSERT INTO my_user_list (My_ID, Fr_list)
                                        VALUES ({$incoming_id}, {$outgoing_id})");


            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>