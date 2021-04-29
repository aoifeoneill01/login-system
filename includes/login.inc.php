<?php

if(isset($_POST["submit"])){

    $username = $_POST["name"];
    $password = $_POST["password"];

    require_once 'db-connect.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $password) !== false){
        header("Location: index.php?error=emptyinput");
        exit();
      }

    loginUser($conn, $username, $password);
}
 else {
     header("location: index.php");
     exit();

 }