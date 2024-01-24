<?php
session_start();

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
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="../style/profile.css" />
	<link rel="stylesheet" href="../style/hamburger.css">
	<title>Confession</title>
</head>

<body>
	<nav class="navBar">
      
		<div class="logo">
			<img src="../images/logo-no-background.png" alt="Logo-Image" class="logo-img" />
		</div>

		
		<?php if (isset($_SESSION['email'])) {
			$email = $_SESSION['email'];
			?>
			<a class='logout-btn' href='./logout.php?ref=profile'>Logout</a>
		<?php } else {
			echo ("<a id='login_btn' class='logout-btn' onclick='loginRedirect()'>Login</a>");
		} ?>
	</nav>
	<main>
		<?php
		if (!isset($_SESSION['email']) && !isset($_GET['username'])) {
			echo ("Either login, or provide a username to view!<br>");
			echo("<input type='text' id='noLoginProfile'> <input type='submit' onclick='profileRedirect()'>");
		} else {
			?>
			<div class="copy-section">
				<div class="broder-class">
					<div class="info">Click the button to copy your Confession Link</div>
					<button class="click-info">Click Here!</button>
				</div>
			</div>
			<div id="confessions-section">
				<div class="broder-class confessions-broder-class">
					<div id="sentConfessions" class="confession-container">
						<span class="profile-confessions">Sent Confessions: </span>
						<div>
							<?php
							require('./mysqlConnection.php');
							if (!isset($_GET['username'])) {
								$userQuery = "SELECT * FROM users where email='$email'";
								$userSql   = mysqli_query($connection, $userQuery);
								$user      = mysqli_fetch_assoc($userSql);
								$username  = $user["username"];
							} else {
								$username = $_GET["username"];
							}
							$confQuery = "SELECT * FROM confessions where usernameBy = '$username'";
							$confSql   = mysqli_query($connection, $confQuery);
							if (mysqli_num_rows($confSql) > 0) {
								while ($row = mysqli_fetch_assoc($confSql)) {
									$content     = $row['content'];
									$confessedTo = $row['usernameTo'];
									echo ("$confessedTo: $content");
									echo ('<br>');
								}
							} else {
								echo ("No confessions made by you yet!");
							}
							?>
						</div>
					</div>
					<div id="line"></div>
					<div id="receivedConfessions" class="confession-container">
						<span class="profile-confessions">Recieved Confessions: </span>
						<div>
							<?php
							if (!isset($_SESSION['email'])) {
								echo ("<a href='./login.php'>Login</a> to view this part!");
							} else {
								$confQuery = "SELECT * FROM confessions where usernameTo = '$username'";
								$confSql   = mysqli_query($connection, $confQuery);
								if (mysqli_num_rows($confSql) > 0) {
									$count = 1;
									while ($row = mysqli_fetch_assoc($confSql)) {
										$content     = $row['content'];
										$confessedBy = $row['usernameBy'];
										echo ("$count: $content - $confessedBy");
										echo ('<br>');
										$count++;
									}
								} else {
									echo ("No confessions made for you yet!");
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</main>
	<script src="../javaScript/script.js"></script>
</body>

</html>