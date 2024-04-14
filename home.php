<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button  onclick="location.href='addnote.php'"> add note</button>
    <button  onclick="location.href='addpassword.php' "> add password</button>
    <button  onclick="location.href='viewpassword.php' "> view saved password</button>
    <button  onclick="location.href='viewnote.php' "> view note</button>
    <button onclick=" location.href='signout.php'"> signout</button>
    <?php
    if (!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit();
    }?>
</body>
</html>