<html>
<head>
<title>Add User to Map</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

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

<form action="addmap.php" method="post" role="form" class="php-email-form">
  <div class="form-row">
    <div class="col-md-6 form-group">
      <input type="text" name="name" class="form-control" id="First name" placeholder="First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
      <div class="validate"></div>
    </div>
    <div class="col-md-6 form-group">
      <input type="text" class="form-control" name="Last Name" placeholder="Last Name" data-rule="minlen:2" data-msg="Please enter at least 2 chars" />
      <div class="validate"></div>
    </div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email" id="subject" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
    <div class="validate"></div>
  </div>
  <div class="form-row">
    <div class="col-md-7 form-group">
      <input type="text" name="city" class="form-control"  placeholder="City" data-rule="minlen:4" data-msg="Please enter at City" />
      <div class="validate"></div>
    </div>
    <div class="col-md-2 form-group">
      <input type="text" class="form-control"  placeholder="State" data-rule="maxlen:2" data-msg="Please enter a State Abbreviation" />
      <div class="validate"></div>
    </div>
    <div class="col-md-3 form-group">
      <input type="text" class="form-control"  placeholder="Zip Code" data-rule = "minlen:5" data-msg="Please enter a valid Zip" />
      <div class="validate"></div>
    </div>
  </div>

  <div class="mb-3">
    <div class="loading">Loading</div>
    <div class="error-message"></div>
    <div class="sent-message">Your request has been sent. Thank you!</div>
  </div>
  <div class="text-center"><button type="submit">Join</button></div>
</form>
</body>
</html>
