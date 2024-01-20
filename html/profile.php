<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ./login.php");
  exit();
}


if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../images/confessions-favicon-color.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../style/profile.css" />
  <link rel="stylesheet" href="../style/hamburger.css">
  <title>Confession</title>
</head>

<body>
  <nav class="navBar">
  
    <div class="logo">
      <img src="../images/logo-no-background.png" alt="Logo-Image" class="logo-img" />
    </div>
   

    <div class="nextItems">
      <ul class="items-flex">
        <li class="item"><a href="#" class="item-a"> Sent</a></li>
        <li class="item"><a href="#" class="item-a"> Recieved</a></li>
      </ul>
    </div>
    <div class="logout">
      <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
  </nav>
  <main class="copy-section">
    <div class="broder-class">
      <div class="info">Click the button to copy your Confession Link</div>
      <button class="click-info">Click Here!</button>
    </div>
  </main>
  <script src="../javaScript/script.js"></script>
</body>

</html>