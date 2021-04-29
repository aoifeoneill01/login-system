<?php

session_start();

if(!isset($_SESSION['userid'])){

  header('location: index.php');
  exit();  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/rog2nul.css">
    <link rel="stylesheet" href="authStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Profile</title>
</head>
<body>

<h1>Your logged in profile</h1>
    
</body>
</html>