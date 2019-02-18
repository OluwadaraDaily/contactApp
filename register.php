  <?php session_start();
require 'db-connect.php';
//  print_r($_SESSION['user_contact']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register user | Contact App | 11-02-2019 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 40px;"> 
<div class="row" >
    <div class="col-md-9" style="border: 1px solid #ccc;padding: 20px;">
    <div class="row">
        <div class="col-md-6">
          <h3>  Register User </h3>
          <form method="POST">
            <label> First Name </label>
            <input type="text" name="first_name" class="form-control" required>

            <label> Last Name </label>
            <input type="text" name="last_name" class="form-control" required>

            <label> Password </label>
            <input type="password" name="password" class="form-control" required>

            <label> Email </label>
            <input type="email" name="email" class="form-control" required>

            <label> Phone Number </label>
            <input type="phone" name="phone" class="form-control" required> <br> <br>

            <input type="submit" name="submit" class="btn btn-success btn-lg" required> <br> <br>

            <?php
              if (isset($_POST['submit'])) {
                # code...
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                $query_check = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}' OR phone = '{$phone}'");
                if (mysqli_num_rows($query_check) > 0) {
                  # code...
                  echo "<p class='alert alert-danger'> Record Already Exists </p>";
                }

                else {
                  $query = mysqli_query($connect, "INSERT INTO users(first_name, last_name, password, email, phone) VALUES('{$first_name}','{$last_name}', '{$password}', '{$email}','{$phone}')");
        
                  while ($fetch = mysqli_fetch_array($query)) {
                    # code...
                    $_SESSION['user'] = [
                      'id'=> $fetch['id'],
                      'first_name'=> $fetch['first_name'],
                      'last_name'=> $fetch['last_name'],
                      'email' => $fetch['email'],
                      'phone' => $fetch['phone']
                    ];
                    echo $fetch['user']['id'];
                    $i++;
                  }
                  if ($query) {
                  # code...
                  echo "<p class='alert alert-success'> Record Inserted Successfully </p>";
                }
                }
              }
            ?>
        </form>
        <a href="login.php"> LOGIN </a>
      </div>
    </div>
    </div>
</div>
</div>
    </body>
    </html>