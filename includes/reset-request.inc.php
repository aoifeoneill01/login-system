<?php

if(isset($_POST['reset-submit'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "<enter website url info>?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'db-connect.php';

    $userEmail = $_POST['email'];

    $sql = 'DELETE FROM password_reset WHERE pwdResetEmail = ?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'There was an error';
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, 's', $userEmail);
        mysqli_stmt_execute($stmt);
    }


    // Insert data into databse
    $sql = 'INSERT INTO <enter-table-info> (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?);';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'There was an error';
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'ssss', $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    // Send rest password link to email
    $to = $userEmail;
    $subject = 'Reset your password for <enter website url>';

    $message = 
    '<p>We’ve received a request to reset your password.</br>
    If you didn’t make the request, just ignore this message. Otherwise, you can reset your password.</br></br>
    Here is your password reset link</br>
    
    <a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: <name> <email address>\r\n";
    $headers = "Reply-to: <email address>\r\n";
    $headers = "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
    header('location: ../reset.php?res=requestsent');


}
else {
    header('location: ../index.php');
}