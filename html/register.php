<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Salsa&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../style/login.css">
    <title>Signup to Confessions</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <div class="login-space">
        <form action="">
            <input type="text" id="username" class="input-field" placeholder="Username">
            <input type="email" id="email" class="input-field" placeholder="Email">
            <input type="password" id="password" class="input-field" placeholder="Password">
            <button type="submit" id="submit">Register</button>
            <p class="invalid_password" id="invalid_password"></p>
        </form>
    </div>



    <script src="../javaScript/script.js"></script>
</body>

</html>