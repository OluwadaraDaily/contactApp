<?php session_start();
  require 'db-connect.php';
  $rel = $_GET['rel'];
  if ($rel == "success") {
    # code...
?>

<script type="text/javascript">
  alert("Record deleted successfully"); 
  window.location = "list-contact.php";
</script>

<?php
  }
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container" style="margin-top: 40px;">
<?php echo "Welcome back, ".$_SESSION['user']['first_name']; ?>, 
<a href="logout.php"><b>logout</b></a>
<div class="row" >
    <div class="col-md-3">
        <div class="list-group">
            <a href="#" class="list-group-item active">Menu</a>
            <a href="list-contact.php" class="list-group-item">List Contacts </a>
            <a href="add-contact.php" class="list-group-item">Add Contact</a>
            <a href="search-contact.php" class="list-group-item">Search Contact</a>
            <a href="delete-contact.php" class="list-group-item">Delete Contact</a>
            <a href="update-contact.php" class="list-group-item">Update Contact</a>
        </div>
    </div>
    <div class="col-md-9" style="border: 1px solid #ccc;padding: 20px;">
    <div class="row">
        <div class="col-md-12">
<h3> List Contact </h3>

<?php
    $user_id = $_SESSION['user']['id'];
   $query = mysqli_query($connect, "SELECT * FROM contact WHERE user_id='{$user_id}'") or die(mysqli_error());
    if (mysqli_num_rows($query) > 0 ) {
        echo "<table class='table'>
        <tr><th>S/N</th><th>First Name</th><th>Last Name </th><th>Email</th><th>Phone Number</th>
        <th> Update Contact </th> <th> Delete Contact </th>
        </tr>";
        $i = 0;
        while($fetch = mysqli_fetch_array($query)) {
            echo "<tr><td>".($i+1)."</td><td>".$fetch['first_name']. "</td><td>".$fetch['last_name']. "</td><td>".$fetch['email']. "</td><td>".$fetch['phone']. "</td><td><a href='update-contact.php?id=".$fetch['id']."'> Update Contact </a></td><td><a href='delete-contact.php?id=".$fetch['id']."'> Delete Contact </a></td></tr>";
            $i++;
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger'>No Contact Added</div>";
    }
?>
        </div>
    </div>
    </div>
</div>
</div>
    </body>
    </html>