<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ./login.php");
  exit();
}

if(isset($_POST['submit'])){
  $content = $_POST['content'];
  $username = $_SESSION['username'];
  $mentionedUser = $_POST['$mentionedUser'];
  include './mysqlConnection.php';

  $countQuery = "SELECT count(confId) FROM confessions";
  $countSql   = mysqli_query($connection, $countQuery);
  $count = mysqli_fetch_array($countSql);
  $newConfId = $count[0] + 1;

  $insertQuery = "INSERT INTO confessions values ('$newConfId', '$content', '$username', '$mentionedUser')";
  $insertSql   = mysqli_query($connection, $insertQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../style/style.css" />
    <link
      rel="icon"
      type="image/x-icon"
      href="../images/confessions-favicon-color.png"
    />
    <title>Confess Secretly! ❤️</title>
  </head>
  <body>
  <?php include 'navbar.php'; ?>
    <!-- <main class="confession"> -->
      <form class="confession" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div id="confession-qn">
          <span id="confession-qn-text">Send me a Message</span>
        </div>
        <div id="confession-ans">
          <input type="text" name="mentionedUser" hidden>
          <textarea id="confession-ans-text" name="content" oninput="mentionUser()"></textarea>
        </div>
        <div class="confess_container">
          <input type="submit" class="confess_btn" name="submit" value="Confess!😁">
        </div>
      </form>
    <!-- </main> -->
    <script src="../javaScript/script.js"></script>
  </body>
</html>
