  <?php session_start();
require 'db-connect.php';
//  print_r($_SESSION['user_contact']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container" style="margin-top: 40px;">
    <div class="row" >
      <div class="col-md-9" style="border: 1px solid #ccc;padding: 20px;">
      <div class="row">
          <div class="col-md-6">
            <h3> Login </h3>
            <form method="POST">
              <label> Email </label>
              <input type="email" name="email" class="form-control" required>

              <label> Password </label>
              <input type="password" name="password" class="form-control" required> <br> <br>

              <input type="submit" name="submit" class="btn btn-secondary btn-lg" value="LOGIN">
              <?php
                if (isset($_POST['submit'])) {
                  # code...
                  $email = $_POST['email'];
                  $password = $_POST['password'];
                  $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
                  if (mysqli_num_rows($query) > 0) {
                    # code...
                    $fetch = mysqli_fetch_array($query);
                    $_SESSION['user'] = [
                      'id'=> $fetch['id'],
                      'first_name'=> $fetch['first_name'],
                      'last_name'=> $fetch['last_name'],
                      'email' => $fetch['email'],
                      'phone' => $fetch['phone']
                    ];
                    header("location:list-contacts.php");
                  }
                }
              ?>
            </form>
          </div>
      </div>
        </div>
      </div>
      </div>
  </body>
</html>