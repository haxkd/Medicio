<?php
include_once 'header.php';
session_start();

if(isset($_SESSION['email'])){
  header('location: profile.php');
}

?>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Forget Password Page</h2>
      
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Forget Password Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->

    <!-- ======= LOGIN Section ======= -->
    <section id="appointment" class="appointment section-bg">
<?php
if(isset($_SESSION['msg'])){
echo " <h3 style='color:red;text-align:center;'>$_SESSION[msg] </h3>";
unset($_SESSION['msg']);
}
?>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: FORGET PASSWORD :-</h2>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <form action="forgetf.php" method="post" role="form">
          <div class="form-row">
            <div class="col-md-12 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
              <div class="validate"></div>
            </div>
            
          </div>
          <div class="text-center"><button type="submit" class="appointment-btn" name="login">FORGET PASSWORD</button></div>

          <br><br>  <div class="text-center">Allready Have an account? 
            <a href="login.php" class="appointment-btn scrollto">LOG IN</a></div>
            
        </form>
        
      </div>
                  <div class="col-md-3"></div>
              </div>
      </div>
    </section><!-- End LOGIN Section -->
</main>
<?php
include_once 'footer.php';
?>