<?php
  require 'config.php';
  if(isset($_POST["register"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    
    $user = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($user) > 0){
      echo
      "<script> alert('Username/Email Has Already Taken'); </script>";
    }
    else{
      $query = "INSERT INTO tb_users VALUES('','$name','$username','$email','$phone','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successfull'); </script>";
    }
  }
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="icon.png">
  <title>RideX-Registration</title>
</head>
<body>
  <div class="container">
    <form action="" method="post">
      <h2>Registration</h2>
      <div class="content">
        <div class="input-box">
          <label for="name">Full Name</label>
          <input type="text" placeholder="Enter full name" name="name" required>
        </div>
        <div class="input-box">
          <label for="username">Username</label>
          <input type="text" placeholder="Enter username" name="username" required>
        </div>
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" placeholder="Enter your valid email address" name="email" required>
        </div>
        <div class="input-box">
          <label for="phonenumber">Phone Number</label>
          <input type="tel" placeholder="Enter phone number" name="phone" required>
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter new password" name="password" required>
        </div>
        <div class="input-box">
          <label for="Cpassword">Confirm Password</label>
          <input type="password" placeholder="Confirm password" name="confirmPassword" required>
        </div>
        <span class="gender-title">Gender</span>
        <div class="gender-category">
          <input type="radio" name="gender" id="male">
          <label for="gender">Male</label>
          <input type="radio" name="gender" id="female">
          <label for="gender">Female</label>
          <input type="radio" name="gender" id="other">
          <label for="gender">Other</label>
        </div>
      </div>
      <div class="alert">
        <p>By clicking Sign Up, you agree to our <a href="#">Terms,</a> <a href="#">Privacy Policy,</a> and <a href="#">Cookies Policy.</a> You may receive SMS notifications from us and can opt out at any time.</p>
      </div>
      <div class="button-container">
        <button type="submit" name="register" value="Register" class="button">Register</button>
        <button type="submit" name="login" value="Login" class="button"><a href="login2.html" style="color: white; text-decoration: none;">Login</a></button>
      </div>
    </form>
  </div>
</body>
</html>