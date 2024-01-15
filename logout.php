<?php
session_start();
session_destroy();
session_start();
$_SESSION['msg'] = 'LOG OUT SUCCESSFULLY'; 
header('location: login.php');
?>
