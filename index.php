<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  include_once "db.php";
  $myID = $_SESSION['unique_id'];
  $sql = "SELECT * FROM users WHERE unique_id = '$myID'"; 
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);
  $image = $row['img'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="style.css">
  <title>SangLap V2</title>
</head>

<body>
  <div class="back-container">
    <div class="Backgroud-mobileView">
      <div class="back-top"></div>
      <div class="back-main"></div>
    </div>
    <div class="container front-container1">
      <div class="row chat-top">
        <div class="col-sm-4 border-right border-secondary">
          <img src="images/<?= $image ?>" alt="" class="profile-image rounded-circle">
          <span class="float-right mt-2 search">
            <!-- (logout or input) & Search & 3-Dot -->
            <span class="text"><a href="logout.php" class="btn btn-secondary" role="button">Logout</a></span>
            <input type="text" placeholder="Name/Group/Channel">
            <button><i class="fas fa-search"></i></button>
            <svg width="1.5em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" /></svg>
          </span>
        </div>
        <!-- right top -->
        <div class="col-sm-8" id="right-top">
          <img src="images/p2.jpg" alt="" class="profile-image rounded-circle">
          <span class="ml-2">Receiver Profile Section</span>
          <span class="float-right"></span>
          
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 contacts">
          <div class="contact-table-scroll">
            <table class="table table-hover">
              <tbody class="myFrList">
                   <?php //include 'userList.php'; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-8 message-area">
          <div class="message-table-scroll">
            <table class="table">
              <tbody class="chat-box">
               
              </tbody>
            </table>
          </div>
          <div class="row message-box p-3">
            <div class="col-sm-2 mt-2">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-smile" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" /> <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z" /> <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" /></svg>
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip mx-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" /> </svg>
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" /> <path d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" /> </svg>
            </div>
              <form action="#" class="typing-area col-sm-8">
                <!-- <input type="text" class="incoming_id" name="incoming_id" value="<?php //echo 0; ?>" hidden> -->
                <div class="row">
                  <div class="col-11"><input type="text" name="message" class="input-field form-control" placeholder="Type a message here..." autocomplete="off"></div>
                  <div class="col-1"><button><i class="fab fa-telegram-plane"></i></button></div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

  </div>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
    integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
    crossorigin="anonymous"></script>

  <script src="javascript/users.js"></script>
  <script src="javascript/chat.js"></script>


</body>

</html>
