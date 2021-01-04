<?php
session_start();
session_destroy();
session_start();
$_SESSION['msg'] = 'ADMIN LOGOUT SUCCESSFULLY!';
header('location: ../admin-login.php');
?>