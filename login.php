<?php
$login = 0;
$failed = 0;



if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';

    $username=$_POST['username'];
    $password=$_POST['password'];



$sql = "select * from `registration` where username =  '$username' and password = '$password' ";

$result =mysqli_query($con,$sql);

if($result){
    $user = mysqli_num_rows($result);
    if($user>0){
        $login = 1;
        session_start();
        $_SESSION['username']=$username;
        header('location: home.php');
    }
    else{
    $failed = 1;    
    }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<?php 
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations !</strong> Login Successful!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<?php
if($failed){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Login failed!</strong> check your credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';  
}
?>

    <h1 class="text-center">Login</h1>
    <form action="login.php" method="post"> 
    <div class="container mt-5"><!-bootstrap class page divided into equal size not taking whole page->
    <form>
  <div class="mb-3">
    <label  class="form-label" >username</label>
    <input type="text" class="form-control" placeholder="enter your username" name = "username">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password" name = "password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">login</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>