<?php
session_start();
include_once 'conn.php';
if(isset($_POST['appointment'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $dept = $_POST['department'];
    $msg = $_POST['message'];
    $q = "INSERT INTO appointment(name,email,date,dept,msg) VALUES ('$name','$email','$date','$dept','$msg')";
    $x = mysqli_query($conn,$q);
    if($x){
        $_SESSION['msg'] = 'APPOINTMENT BOOKED SUCCESSFULLY';
        header('location: profile.php');
    }else{
        $_SESSION['msg'] = 'APPOINTMENT IS ALREADY BOOKED';
        header('location: profile.php');
    }
}
else{
    echo 'GET OUT................';
}
?>
