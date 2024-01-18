<?php
if (!isset($_SESSION['email'])) {
 
  header("Location: ./login.php");
  exit();
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
    <main class="confession">
      <div id="confession-qn">
        <span id="confession-qn-text">Send me a Message</span>
      </div>
      <div id="confession-ans">
        <textarea id="confession-ans-text"></textarea>
      </div>
      <div class="confess_container">
        <button class="confess_btn">Confess!😁</button>
      </div>
    </main>
    <script src="../javaScript/script.js"></script>
  </body>
</html>
