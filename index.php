<?php
include("connect.php");
session_start();
if (isset($_COOKIE["name"]))
{ 
    $_SESSION['name'] = $_COOKIE["name"];
    header("Location: /12thAssignment/diary.php");
}
if(isset($_POST['login'])){
  $username = $_POST['name'];
  $password = $_POST['pass'];
  $query = "SELECT * FROM users WHERE usernames = '$username' AND pass = '$password'";
  $result = mysqli_query($conn, $query);
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] =  $row["usernames"];
    if(isset($_POST['rememberme'] )){
      setcookie('name', $row["usernames"], time()+86400);
      header("Location: /12thAssignment/diary.php");
    }else header("Location: /12thAssignment/diary.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
    <link rel="stylesheet" href="css.css" />
  </head>
  <body>
    <div class="content">
      <h1>Secret Diary</h1>
      <p>Store your thoughts permenantly and securely.</p>
      <p>Login using your username and password.</p>
      <?php
        if(isset($_POST['login'])){
          if(!isset($row)){
            echo "<p style='color: red;'>Username/Password does not exist!</p>";
          }
        }
      ?>
      <form action="index.php" method="post">
        <input type="text" placeholder="Username" name="name" />
        <input type="password" placeholder="Password" name="pass" />
        <div>
          <label for="check">Keep me signed in</label>
          <input type="checkbox" name="rememberme" id="check" />
        </div>
        <input type="submit" id="submit" value="Login" name="login" />
      </form>
      <a href="signup.php">Sign-up</a>
    </div>
  </body>
</html>
