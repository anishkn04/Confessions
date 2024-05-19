<?php
session_start();

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
}
$GLOBALS['username'] = ""
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
	<script src="../javaScript/script.js"></script>
	<title>Confession</title>
</head>

<body>
	<?php include "navbar.php" ?>
	<main>
		<?php
		if (!isset($_SESSION['email']) && !isset($_GET['username'])) {
			echo ("Either login, or provide a username to view!<br>");
			echo("<input type='text' id='noLoginProfile'> <input type='submit' onclick='profileRedirect()'>");
		} else {
			?>
			<div id="confessions-section">
				<div class="broder-class confessions-broder-class height">
					<div id="sentConfessions" class="confession-container">
						<span class="profile-confessions">Sent Confessions: </span>
						<div>
							<?php
							require('./mysqlConnection.php');
							if (!isset($_GET['username'])) {
								$userQuery = "SELECT * FROM users where email='$email'";
								$userSql   = mysqli_query($connection, $userQuery);
								$user      = mysqli_fetch_assoc($userSql);
								$GLOBALS['username']  = $user["username"];
							} else {
								$GLOBALS['username'] = $_GET["username"];
							}
							$username = $GLOBALS['username'];
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
								$username = $GLOBALS['username'];
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
				<div class="broder-class change">
					<div class="info" onclick="copyToClipBoard('<?php echo $GLOBALS['username'] ?>')">Click here to copy your Confession Link</div>
				</div>
			</div>
		<?php } ?>
	</main>
</body>

</html>