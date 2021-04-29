<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/rog2nul.css">
    <link rel="stylesheet" href="authStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Signup</title>
</head>
<body>
    
<div class="signup-container" id="signup">
    <form action="includes/signup.inc.php" method="POST">
        <h2>Create an account</h2>

<?php

  if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
          echo "<p class='error'>Fill in all fields</p>";
      }
      else if($_GET["error"] == "invalidemail"){
          echo "<p>Invalid email</p>";
      }
      else if($_GET["error"] == "usernametaken"){
          echo "<p class='error'>Username or email already exist</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
        echo "<p class='error'>Something went wrong, try again</p>";
    }
  }

?>

        <input type="text" name="name" placeholder="Username" required />
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <div class="login-p-container">
        <div class="password-show">
          <input type="checkbox" class="pass">
          <p class="passwordChange">Show password</p> 
        </div>
        </div>

        <button name="submit" type="submit">Sign up</button>
        <p class="register">Already have an Account? <span><a href="index.php">Login</a></span></p>
      </form>
</div>   


<script src="showPassword.js"></script>

</body>
</html>