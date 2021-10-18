<?php
session_start();
$form = $_SESSION["form"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./success.css">
    <link rel="stylesheet" href="./index.css">
    <title>Form submitted</title>
</head>

<body>
    <div class="App">
        <div class="img-container">
            <img src="./img/thank.svg" alt="">
        </div>
        <div class="text-container">
            <h1>Thank You For Sharing !</h1>
            <p>Thank you so much for taking the time to leave us the feedback - it's much appreciated!</p>
            <p>Here is the summary of your feedback</p>
            <div class="summary-container">
                <img src="./img/avatar.svg" alt="">
                <div class="comment-container">
                    <p><?= strtoupper($form["issue"]) ?></p>
                    <p><?= $form["comment"] ?></p>
                    <h3><?= strtoupper($form["username"]) ?></h3>
                    <p><?= $form["email"] ?></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>