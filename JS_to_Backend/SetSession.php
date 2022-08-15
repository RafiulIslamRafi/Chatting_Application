<?php
    session_start();
    include '../db.php';
    $_SESSION['selected_fr'] = $_REQUEST['incoming_id'];
    $id = $_REQUEST['incoming_id'];
    $sql = "SELECT * FROM users WHERE unique_id = '$id'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    
    // print_r($row);
    echo '<img src="images/'. $row['img'] .'" alt="" class="profile-image rounded-circle">
          <span class="ml-2">'. $row['fname'] . " " . $row['lname'] .'</span>
          <span class="float-right">'. $row['status'] .'</span>';
?>