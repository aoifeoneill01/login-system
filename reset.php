<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/rog2nul.css">
    <link rel="stylesheet" href="authStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Reset Password</title>
</head>
<body>

<div class="signup-container" id="reset">
    <form action="includes/reset-request.inc.php" method="POST">
        <h2>Reset Password</h2>
        <p class="reset-title">Please enter your email below and we'll send you a link to get back into your account</p>

        <?php

        if(isset($_GET['res'])){
            if($_GET['res'] == 'requestsent'){
                echo '<p class="correct">Check your email for a reset password link</p>';
            }
        }

        ?>
  
        <input type="text" name="email" placeholder="Email" required />
        <div class="email error"></div>

        <button name="reset-submit" type="submit">Send Login Link</button>
        <p class="register">Back to <span><a href="index.php">Login</a></span></p>
      </form>
</div>
    
</body>
</html>