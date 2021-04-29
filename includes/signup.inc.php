<?php


if(isset($_POST["submit"])) {

    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

include 'db-connect.php';
include 'functions.inc.php';

if(emptyInputSignup($username, $email, $password) !== false){
    header("Location: signup.php?error=emptyinput");
    exit();
  } 

if(invalidEmail($email) !== false){
   header("Location: signup.php?error=invalidemail");
   exit();
  }  

if(usernameExists($conn, $username, $email) !== false){
    header("Location: signup.php?error=usernametaken");
    exit();
   }  

   createUser($conn, $username, $email, $password);

}
else {
    header("Location: signup.php");
    exit();
}

?>