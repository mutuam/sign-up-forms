<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

$sql = "SELECT * FROM `registration` WHERE username='$username' and password='$password'";
$result = mysqli_query($con, $sql);

if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
    } else {
        $invalid=1;
        // Insert the new user
       // $sql = "INSERT INTO `registration` (username, password) VALUES ('$username', '$password')";
        //$result = mysqli_query($con, $sql);
        
       // if ($result) {
            //echo "Signup successful";
       //     $success=1;
       // } else {
        //    die("Error: " . mysqli_error($con));
       // }
    }
} else {
    die("Error: " . mysqli_error($con));
}
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login page.</title>
</head>
  <body>
  <?php
    if($login){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong>you are successfully logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>

<?php
    if($invalid){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>error!</strong>invalid credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    ?>
    <h1 class="text-center">log in to our website</h1>
    <div class="container mt-5">
    <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  placeholder="Enter your user name" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  placeholder="Enter your password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100">login</button>
</form>
    </div>

    
  </body>
</html>