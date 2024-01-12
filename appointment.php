<?php
session_start();
include_once 'header.php';
include_once 'conn.php';
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}else{
    header('location: login.php');
}
$q = "SELECT * FROM user WHERE email='$email'";
$x = mysqli_query($conn,$q);
$row = mysqli_fetch_assoc($x);
$name = $row['name'];
$phone = $row['phone'];
?>
<main id="main">
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Appointment Page</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Appointment Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs Section -->
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <form action="appointments.php" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>" placeholder="Your Name" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="tel" class="form-control" name="phone" id="phone" value="+91 <?php echo $phone; ?>" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <select name="department" id="department" class="form-control" required>
                <option value="">Select Department</option>
                <option value="Allergists">Allergists</option>
                <option value="Anesthesiologists">Anesthesiologists</option>
                <option value="Cardiologists">Cardiologists</option>
                <option value="Dermatologists">Dermatologists</option>
                <option value="Endocrinologists">Endocrinologists</option>
                <option value="Gastroenterologists">Gastroenterologists</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center"><button type="submit" class="appointment-btn" name="appointment">Make an Appointment</button></div>
        </form>
      </div>
    </section><!-- End Appointment Section -->
</main>
<?php
include_once 'footer.php';
?>
