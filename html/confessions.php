<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ./login.php");
  exit();
}

include './mysqlConnection.php'; 

if(isset($_POST['submit'])){
  $content = $_POST['content'];
  $username = $_SESSION['username'];
  $mentionedUser = $_POST['mentionedUser'];

  $countQuery = "SELECT count(confId) FROM confessions";
  $countSql = mysqli_prepare($connection, $countQuery);
  mysqli_stmt_execute($countSql);
  mysqli_stmt_bind_result($countSql, $count);
  mysqli_stmt_fetch($countSql);
  mysqli_stmt_close($countSql); 

  $newConfId = $count + 1;

  $insertQuery = "INSERT INTO confessions (confId, content, usernameBy, usernameTo) VALUES (?, ?, ?, ?)";
  $insertSql = mysqli_prepare($connection, $insertQuery);
  mysqli_stmt_bind_param($insertSql, "isss", $newConfId, $content, $username, $mentionedUser);
  mysqli_stmt_execute($insertSql);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="icon" type="image/x-icon" href="../images/confessions-favicon-color.png" />
    <title>Confess Secretly! ❤️</title>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <form class="confession" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div id="confession-qn">
        <span id="confession-qn-text">Send me a Message</span>
      </div>
      <div id="mention">
        <input type="text" id="mention-text" placeholder="Mention Confidante" name="mentionedUser" required>
      </div>
      <div id="confession-ans">
        <textarea id="confession-ans-text" name="content"></textarea>
      </div>
      <div class="confess_container">
        <input type="submit" class="confess_btn" name="submit" value="Confess!😁">
      </div>
    </form>
    <script src="../javaScript/script.js"></script>
  </body>
</html>
