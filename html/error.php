<?php
$type =  $_GET["type"];
$texts = [
    "LoginError" => "Couldn't Login, please recheck your data or try again later!",
    "ConnectionError" => "Problem in our side, we will fix it soon!",
    "RegisterError" => "Couldn't Sign up, please re-check your data or try again later!"
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error: <?php echo $type ?></title>
    <style>
        *{
            margin: 00;
            padding: 0;
        }
        main{
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .errorContainer{
            height: 70%;
            width: 80%;
            background-color: #ff1111db;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }
        .errorType, .errorText{
            width: 100%;
            min-height: 50px;
            color: white;
            font-size: 1.3rem;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: auto;
        }
        .errorType{
            border-bottom: 2px solid white;
        }
        .errorText{
            flex-grow: 1;
        }
        a{
            border: 1px;
            border-radius: 8px;
            text-decoration: none;
            background-color: #3370ffdb;
            color: white;
            height: 50px;
            justify-content: center;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <main>
        <div class="errorContainer">
            <div class="errorType"><?php echo $type ?></div>
            <div class="errorText"><?php echo $texts[$type] ?></div>
            <a href="../">Back to home</a>
        </div>
    </main>
</body>
</html>