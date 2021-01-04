<?php
session_start();
if(empty($_SESSION['admin'])){
  header('location: ../admin-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="coolmanage admin">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Medico</title>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
      <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link href="asset/css/style.css" rel="stylesheet">
	<link href="asset/css/style1.css" rel="stylesheet">
	<!-- end: Css -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
  
  <style>
  .container{
    padding:5%;
    margin-top: 50px;
}

    </style>

      <!-- start: Header -->
        <?php include 'include/header.php'; ?>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
          <?php  include 'include/sidebar.php'; ?>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->

          

        <div class="container table-responsive">
        <?php
  if(isset($_SESSION['msg'])){
  echo "<h3 class='text-center' style='color:red;'>$_SESSION[msg]</h3>";
  unset($_SESSION['msg']);
}
?>
        
            <center>
                <h2>-: Appointments :-</h2>
            </center>
          <table class="table table-dark table-hover" style="margin-top:50px;" border="5">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>DATE</th>
                <th>DEPARTMENT</th>
                <th>MESSAGAE</th>
                <th><span style="color: green;">Approve</span></th>
                <th><span style="color: red;">Decline</span></th>
            </thead>
            <tbody>
            <?php
include_once 'include/conn.php';
$q = "SELECT * FROM appointment";
$x = mysqli_query($conn,$q);
while($row = mysqli_fetch_assoc($x)){
echo "<tr>
      <td>$row[id]</td>
      <td>$row[name]</td>
      <td>$row[email]</td>
      <td>$row[date]</td>
      <td>$row[dept]</td>
      <td>$row[msg]</td>
      <td><a href='func.php?approve=$row[email]' class='btn btn-success'> APPROVE</a></td>
      <td><a href='func.php?decline=$row[email]' class='btn btn-danger'> DECLINE</a></td>
    </tr>";
}
?>


            </tbody>
          </table>
        </div>




          <!-- end: content -->    
          <!-- start: right menu -->
          <!-- end: right menu -->
          
      </div>

      <!-- start: Mobile -->
     
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
     <script src="asset/js/main.js"></script>
  <!-- end: Javascript -->
  </body>
</html>