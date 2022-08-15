<?php
    session_start();
    include_once "../db.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users, my_user_list WHERE NOT unique_id = {$outgoing_id} and my_user_list.My_ID = {$outgoing_id} and users.unique_id = my_user_list.Fr_list ORDER BY user_id DESC"; //fr list e ace kina check kore nite hobe: update kora lagbe
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>