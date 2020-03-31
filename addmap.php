

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
// Creating a cookie after the document is ready
$(document).ready(function () {
    createCookie("gfg", "GeeksforGeeks", "10");
});

// Function to create the cookie
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
}

</script>
<html>
<?php
echo $_COOKIE["gfg"];
if(isset($_POST['submit'])){

    $data_missing = array();
 ;
    if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = $_POST['first_name'];

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
    if(empty($_POST['status'])){

        // Adds name to array
        $data_missing[] = 'Status';

    } else {

        // Trim white space from the name and store the name
        $status = trim($_POST['status']);

    }



    if(empty($data_missing)){

        require_once('mysqli_connect.php');

        $query = "INSERT IGNORE INTO user (first_name, email,
         city, state, zip, status) VALUES (?, ?,
        ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "ssssis", $f_name,
                                $email, $city,
                               $state, $zip, $status );

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            $success = "Information Successfully Entered";

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            $success = 'Email Already In System';


            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        $success = 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

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

          <li><a href="#services">Hospitals</a></li>
          <li><a href="#values">Manufacturers/Makers</a></li>
          <li><a href="#map">Connect</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



  <!-- ======= joing Map Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-up"><?=$success?></h2>
        <p data-aos="fade-up">Thank you for support us and helping the cause. Please help us spread the word by sharing this among you community, friends, and family.</p>
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


</body>
</html>
