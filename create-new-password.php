<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/rog2nul.css">
    <link rel="stylesheet" href="styles/authStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Create new password</title>
</head>
<body>

<?php

$selector = $_GET['selector'];
$validator = $_GET['validator'];

if(empty($selector) || empty($validator)){
    echo ' Could not validate your request';
}
else {
if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){

?>

<div class="signup-container" id="signup">
    <form action="includes/reset-password.inc.php" method="POST">
        <h2>Create New Password</h2>
  
        <input type="hidden" name="selector" value="<?php echo $selector ?>" />
        <input type="hidden" name="validator" value="<?php echo $validator ?>" />

        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="password-repeat" placeholder="Repeat Password" required />

        <button name="reset-password-submit" type="submit">Reset Password</button>
        <p class="register">Back to <span><a href="index.php">Login</a></span></p>
      </form>
</div>


<?php

    }
}

?>
    
</body>
</html>