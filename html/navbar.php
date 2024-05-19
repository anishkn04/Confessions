<nav class="navBar">
  <a href="./confessions.php" id="logo-container">
    <img src="../images/logo-no-background.png" alt="Confession_Logo" id="logo" />
  </a>

  <div id="text-container">
    <p>Confess Your Love.</p>
  </div>

  <div id="login-container">
    <?php 
    if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      
      $currentPage = basename($_SERVER['PHP_SELF']);
      if ($currentPage !== 'profile.php') {
        echo "<a id='profile_btn' href='../html/profile.php'>Profile</a>";
      }
      else{
        echo "<a href='../html/confessions.php' id='back_btn'>Back</a>";
      }
      echo "<button id='logout_btn' onclick='logout()'>Logout</button>";
    } else {
      echo "<button id='login_btn' onclick='loginRedirect()'>Login</button>";
    } 
    ?>
  </div>
</nav>
