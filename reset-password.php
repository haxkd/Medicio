<?php
include_once 'header.php';
include_once 'conn.php';
?>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Reset Password Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Reset Password Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->


<?php

if(isset($_GET['key']) && isset($_GET['email']) && !empty($_GET['key']) && !empty($_GET['email'])){
    $key = $_GET['key'];
    $email = $_GET['email'];
    $q = "SELECT * FROM forget WHERE otp ='$key' and email='$email'";
    $query = mysqli_query($conn,$q);
    if(mysqli_num_rows($query)==0){
        echo "<div class='text-center'><h2 style='color:red;'>Invalid Link</h2>
        <p>The link is invalid/expired. Either you did not copy the correct link from the email, 
        or you have already used the key in which case it is deactivated.</p>
        <p><a href='forget.php'>Click here to reset password --></a></p></div>";
    }
    else{
        ?>

<section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>-: RESET PASSWORD :-</h2>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <form action="forgetf.php" method="post" role="form">
          <div class="form-row">
            <div class="col-md-12 form-group">
            <input type="hidden" value="<?php echo $email?>" name="femail">
            <input type="text" class="form-control" name="password" id="password" placeholder="New Password" data-rule="Passsword" data-msg="Please enter a valid Password" required>
            <div class="validate"></div>
            </div>
          </div>
          <div class="text-center"><button type="submit" class="appointment-btn" name="changepassword">CHANGE PASSWORD</button></div>

        
            
        </form>
        
      </div>
                  <div class="col-md-3"></div>
              </div>
      </div>
    </section>



<?php
    }


}else{
    echo 'something went wrong';
}




?>

















</main>
<?php
include 'footer.php';
?>