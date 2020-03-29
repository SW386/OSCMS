<!DOCTYPE html>
<html lang="en">
<!--Hello this is Kevin-->
<!--Hello this is Michael Fei-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCMS</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Leaflet map-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flexor - v2.0.0
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar =======
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a></li>
          <li><i class="icofont-phone"></i> +1 5589 55488 55</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li>
        </ul>

      </div>
      <div class="cta">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </section>
 -->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>OSCMS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!--<a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>

          <li><a href="#services">Services</a></li>
          <li><a href="#values">Categories</a></li>
          <li><a href="#portfolio">Designs</a></li>
          <li><a href="#map">Connect</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->





  <?php

  if(isset($_POST['submit'])){

      $data_missing = array();
   ;
      if(empty($_POST['first_name'])){

          // Adds name to array
          $data_missing[] = 'First Name';

      } else {

          // Trim white space from the name and store the name
          $f_name = trim($_POST['first_name']);

      }

      if(empty($_POST['last_name'])){

          // Adds name to array
          $data_missing[] = 'Last Name';

      } else{

          // Trim white space from the name and store the name
          $l_name = trim($_POST['last_name']);

      }

      if(empty($_POST['email'])){

          // Adds name to array
          $data_missing[] = 'Email';

      } else {

          // Trim white space from the name and store the name
          $email = trim($_POST['email']);

      }


      if(empty($_POST['city'])){

          // Adds name to array
          $data_missing[] = 'City';

      } else {

          // Trim white space from the name and store the name
          $city = trim($_POST['city']);

      }

      if(empty($_POST['state'])){

          // Adds name to array
          $data_missing[] = 'State';

      } else {

          // Trim white space from the name and store the name
          $state = trim($_POST['state']);

      }

      if(empty($_POST['zip'])){

          // Adds name to array
          $data_missing[] = 'Zip Code';

      } else {

          // Trim white space from the name and store the name
          $zip = trim($_POST['zip']);

      }




      if(empty($data_missing)){

          require_once('mysqli_connect.php');

          $query = "INSERT INTO user (first_name, last_name, email,
           city, state, zip) VALUES (?, ?, ?,
          ?, ?, ?)";

          $stmt = mysqli_prepare($dbc, $query);


          mysqli_stmt_bind_param($stmt, "sssssi", $f_name,
                                 $l_name, $email, $city,
                                 $state, $zip);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if($affected_rows == 1){

              echo 'User Entered';

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);

          } else {

              echo 'Error Occurred<br />';
              echo mysqli_error();

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);

          }

      } else {

          echo 'You need to enter the following data<br />';

          foreach($data_missing as $missing){

              echo "$missing<br />";

          }

      }

  }

  ?>

  <!-- ======= joing Map Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-up">Join the Map</h2>
        <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
        <div class="col-xl-9 col-lg-12 mt-4">
          <form action="addmap.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

              </div>
              <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" data-rule="minlen:2" data-msg="Please enter at least 2 chars" />

              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email"placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />

            </div>
            <div class="form-row">
              <div class="col-md-7 form-group">
                <input type="text" name="city" class="form-control"  placeholder="City" data-rule="minlen:4" data-msg="Please enter at City" />

              </div>
              <div class="col-md-2 form-group">
                <input type="text" class="form-control" name="state" placeholder="State" data-rule="maxlen:2" data-msg="Please enter a State Abbreviation" />

              </div>
              <div class="col-md-3 form-group">
                <input type="text" class="form-control" name="zip"  placeholder="Zip Code" data-rule = "minlen:5" data-msg="Please enter a valid Zip" />

              </div>
            </div>
         <div class="text-center"><input type="submit" name="submit" value="Send" ></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->





  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
