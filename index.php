<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/rog2nul.css">
    <link rel="stylesheet" href="authStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Login</title>
</head>
<body>

<!-- Login Container -->
<div class="signup-container">
    <form action="includes/login.inc.php" method="POST">
        <h2>Login</h2>

        <?php
    
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p class='error'>Fill in all fields</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo "<p class='error'>Incorrect login details</p>";
            }
        }
  
        if(isset($_GET["newpwd"])){
        if($_GET["newpwd"] == "passwordupdated"){
            echo "<p class='correct'>Your password has been reset</p>";
        }
      }

      if(isset($_GET["error"])){
      if($_GET["error"] == "none"){
        echo "<p class='correct'>You have signed up, now login!</p>";
       }
      }

      ?>

        <input type="text" name="name" placeholder="Username or Email" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <div class="login-p-container">
        <div class="password-show">
          <input type="checkbox" class="pass">
          <p class="passwordChange">Show password</p> 
        </div>
       </div>

        <button name="submit" type="submit">Login</button>
        <p class="register">Don't have an Account? <span><a href="signup.php">Sign up</a></span></p>
      </form>
   </div>

   <script src="showPassword.js"></script>


</body>
</html>