<?php

function emptyInputSignup($email, $username, $password){
    $result;

    if(empty($username) || empty($email) || empty($password)){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

// Check email is valid
function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

// Check if username or email already exists
function usernameExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: signup.php?error=stmtfailed");
        exit();
   }
    mysqli_stmt_bind_param($stmt, "ss",  $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


// Create user
function createUser($conn, $username, $email, $password){
    $sql = "INSERT INTO users(usersName, usersEmail, usersPassword) VALUES(?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: signup.php?error=stmtfailed");
        exit();
   }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss",  $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: index.php?error=none");
    exit();
}

// Check if missing login credentials
function emptyInputLogin($username, $password){
  $result;

  if(empty($username)|| empty($password)){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Login existing user
function loginUser($conn, $username, $password){
$userExists = usernameExists($conn, $username, $username);

  if($userExists == false){
    header("location: index.php?error=wronglogin");
    exit();
  }

  $passwordHashed = $userExists["usersPassword"];
  $checkPassword = password_verify($password, $passwordHashed);

  if($checkPassword == false){
    header("location: index.php?error=wronglogin");
    exit();
  }
  else if ($checkPassword == true){
    session_start();
    $_SESSION["userid"] = $userExists["usersId"];
    header("location: profile.php");
    exit();
    }
  }