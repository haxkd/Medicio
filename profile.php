<?php
session_start();
include_once 'header.php';
include_once 'conn.php';

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}else{
    header('location: login.php');
}
?>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Profile Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Profile Page</li>
        <li><a href="logout.php" class="appointment-btn scrollto">LOGOUT</a></li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->

<?php

$q = "SELECT * FROM user WHERE email='$email'";
$x = mysqli_query($conn,$q);
$row = mysqli_fetch_assoc($x);
$name = $row['name'];
$phone = $row['phone'];
$msg = $row['msg'];
?>
<?php
if(isset($_SESSION['msg'])){
echo "<h3 style='color:red;text-align:center;'>$_SESSION[msg] </h3>";
unset($_SESSION['msg']);
}
?>

    <!-- ======= PROFILE Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: PROFILE :-</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $name; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $email; ?>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $phone; ?>

                        </div>
                    </div>
                    <hr>

                  <?php
                  if(!empty($msg)){
                    echo "<div class='row'>
                    <div class='col-sm-3'>
                    <h6 class='mb-0'>Notice</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                    <h6 style='color:red;'>$msg</h6>
                    </div>
                </div>";
                  }
                  ?>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4" style="margin-top: 90px;margin-left: 90px;"><h4>YOUR APPOINTMENTS</h4><a href="appointment.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a></div>
        </div>
    </div>

    </section><!-- End LOGIN Section -->

<?php
include_once 'footer.php';
?>