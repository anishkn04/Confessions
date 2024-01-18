<?php
if (isset($_POST['login'])) {
  $email    = $_POST['email'];
  $password = $_POST['password'];
  include './mysqlConnection.php';

  $checkQuery = "SELECT email, `password` FROM users";
  $checkSql   = mysqli_query($connection, $checkQuery);
  while ($row = mysqli_fetch_row($checkSql)) {
    if ($row[0] == $email) {
      if($row[1]== $password){
        echo("<script> alert('You may now enter the site!'); window.location.href='./confessions.php'; </script>");
        die();
      }
      echo("<script> alert('Incorret Password!'); window.location.href='./login.php'; </script>");
      die();
    }
    echo ("<script> alert('No such user found!'); window.location.href='./login.php'; </script>");
    die();
  }
  echo("Something went terribly wrong!");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../style/login.css">
  <title>Login to Confessions</title>
</head>

<body>
  <?php
  include "navbar.php";
  ?>

  <div class="login-space">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <input type="email" id="email" name="email" class="input-field" placeholder="Email">
      <p class="invalid_email" id="ivalid_email"></p>
      <input type="password" id="password" name="password" class="input-field" placeholder="Password">
      <p class="invalid_password" id="invalid_password"></p>
      <button type="submit" id="submit" name="login">Login</button>
      <p><a href="./register.php">Register?</a></p>
    </form>
  </div>



  <script src="../javaScript/script.js"></script>
</body>

</html>