<?php
include("connect.php");
if(isset($_POST['signup'])){
  $username = $_POST['name'];
  $password = $_POST['pass'];
  $query1 = "INSERT INTO users (usernames, pass) VALUES ('$username', '$password')";
  $query2 = "SELECT * FROM users WHERE usernames = '$username'";
  $result2 = mysqli_query($conn, $query2);
  if($result2->num_rows > 0){
    echo "<script>alert('User already exists')</script>";
    exit;
    header("Location: /12thAssignment/signup.php");
  }else{
    mysqli_query($conn, $query1);
    $message = "Added successfuly, please go to sign in";
    echo "<script type='text/javascript'>alert('$message');</script>";
    exit;
    header("Location: /12thAssignment/index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-up page</title>
    <link rel="stylesheet" href="css.css" />
  </head>
  <body>
    <div class="content">
      <h1>Secret Diary</h1>
      <p>Store your thoughts permenantly and securely</p>
      <p>Login using your username and password</p>
      <form action="signup.php" method="POST">
        <input type="text" placeholder="Username" name="name" />
        <input type="password" placeholder="Password" name="pass"/>
        <input type="submit" id="submit" name="signup" value="Register" />
      </form>
      <a href="index.php">Sign-in</a>
    </div>
  </body>
</html>
