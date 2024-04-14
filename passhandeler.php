<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}



if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $webemail = $_POST['webemail'];
    $email  = $_SESSION['email'];
    $passwd = $_POST['passwd'];
    $sql="INSERT INTO `userpassword`(`useremail`, `title`, `webemail`, `passwd`) VALUES ('$email','$title','$webemail','$passwd')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    echo("password addded`");}
    else {echo("data not inserted into password");}

}

else{
    echo("failed    " );
}