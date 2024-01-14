<?php
session_start();
include_once 'conn.php';
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    $q = "SELECT * FROM user WHERE email='$email'";
    $results = mysqli_query($conn, $q);
        if (mysqli_num_rows($results)==0) {
            echo "<p>No user is registered with this <b> $email </b> email address!</p>";
        }else{
            $key = rand(1000,9999);
            $key = md5($key.$email);
            $q = "INSERT INTO forget (email,otp) VALUES ('$email', '$key')";
            $c = mysqli_query($conn,$q);
            if($c){
            $body="<p><a href='http://localhost/medico/reset-password.php?key=$key&email=$email' target='_blank'>https:/localhost/medico/reset-password.php?key=$key&email=$email</a></p>";		
            $subject = "Password Recovery - LOCALHOST";
            require 'mailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'haxkdmail@gmail.com';                 // SMTP username
            $mail->Password = 'PASSWORD';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->setFrom('haxkdmail@gmail.com', 'USER');
            $mail->addAddress($email);     
            $mail->addReplyTo('haxkdmail@gmail.com', 'Information');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'Forget Password';
            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $_SESSION['msg'] = 'Email has been sent with forget link';
                header('location: login.php');
                exit();
            }
            }else{
                $_SESSION['msg'] = 'Message already has been sent with forget link';
                header('location: login.php');
                exit();
            }
        }
}
else if(isset($_POST['changepassword'])){
    $email = $_POST['femail'];
    $pass = $_POST['password'];
    echo $qu = "UPDATE user SET password = '$pass' WHERE email='$email'";
    echo $qd = "DELETE FROM forget WHERE email='$email'";
    $xu = mysqli_query($conn,$qu);
    $xd = mysqli_query($conn,$qd);
    if($xu && $xd){
        $_SESSION['msg'] = 'PASSWORD UPDATED SUCCESSFULLY';
        header('location: login.php');
        exit();
    }else{
        $_SESSION['msg'] = 'PASSWORD UPDATE FAILED';
        header('location: login.php');
        exit();
    }
}
else{
    echo 'PLEASE ENTER EMAIL................!';
}
?>
