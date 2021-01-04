<?php
session_start();
include_once 'include/conn.php';
if(isset($_GET['approve']) && !empty($_GET['approve'])){
    $email = $_GET['approve'];
    $q1 = "DELETE FROM appointment WHERE email='$email'";
    $q2 = "UPDATE user SET msg ='YOUR APPOINTMENT IS APPROVED....!' WHERE email='$email'";
    $x1 = mysqli_query($conn,$q1);
    $x2 = mysqli_query($conn,$q2);
    if($x1 && $x2){
        $_SESSION['msg']='APPROVED SUCCESS........!';
        header('location: index.php');
        exit();
    }else{
        $_SESSION['msg']='APPROVED FAILED........!';
        header('location: index.php');
        exit();
    }
}
else if(isset($_GET['decline']) && !empty($_GET['decline'])){
    $email = $_GET['decline'];
    $q1 = "DELETE FROM appointment WHERE email='$email'";
    $q2 = "UPDATE user SET msg ='YOUR APPOINTMENT IS DECLINED....!' WHERE email='$email'";
    $x1 = mysqli_query($conn,$q1);
    $x2 = mysqli_query($conn,$q2);
    if($x1 && $x2){
        $_SESSION['msg']='DECLINED SUCCESS........!';
        header('location: index.php');
        exit();
    }else{
        $_SESSION['msg']='DECLINED FAILED........!';
        header('location: index.php');
        exit();
    }
}
else if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $email = $_GET['delete'];
    $q1 = "DELETE FROM user WHERE email='$email'";
    $x1 = mysqli_query($conn,$q1);
    if($x1){
        $_SESSION['msg']='USER DELETE SUCCESS........!';
        header('location: users.php');
        exit();
    }else{
        $_SESSION['msg']='USER DELETE FAILED........!';
        header('location: users.php');
        exit();
    }
}
else{
    echo 'NO ACTION FOUND';
}
?>