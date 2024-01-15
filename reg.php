<?php
session_start();
include_once 'conn.php';
if(isset($_POST['signup'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$q = "INSERT INTO user (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
$x = mysqli_query($conn,$q);
if($x){
    $_SESSION['msg'] = 'Registration Successfully........!';
    header("location: login.php");
    exit();
    }
    else{
        $_SESSION['msg'] = 'Email is Already Exist.............!';
    header("location: login.php");
    exit();
        }
}
else if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$q = "SELECT * FROM user WHERE email='$email'";
$x = mysqli_query($conn,$q);
if(mysqli_num_rows($x)>0){
    $row = mysqli_fetch_assoc($x);
    if($password==$row['password']){
        $_SESSION['email']=$email;
    header('location: profile.php');
    }else{
        $row['password'];
        $_SESSION['msg']='PASSWORD IS WRONG';
        header('location: login.php');
    }
}else
{
    $_SESSION['msg']='EMAIL NOT FOUND';
    header('location: login.php');
}
}
else if(isset($_POST['adminlogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $q = "SELECT * FROM adminlogin WHERE email='$email'";
    $x = mysqli_query($conn,$q);
    if(mysqli_num_rows($x)>0){
        $row = mysqli_fetch_assoc($x);
        if($password==$row['password']){
            $_SESSION['admin']=$email;
        header('location: admin/index.php');
        }else{
            $row['password'];
            $_SESSION['msg']='PASSWORD IS WRONG';
            header('location: admin-login.php');
        }
    }else
    {
        $_SESSION['msg']='ADMIN NOT FOUND';
        header('location: admin-login.php');
    }
    }


else{
    echo 'GET OUT.......................!';
}
?>
