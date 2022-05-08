<?php

if (isset($_POST["submit"])){

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrp = $_POST["pwdrp"];

    require_once 'dbhinc.php';
    require_once 'functionsinc.php'; 

    if (emptyInputSignup($username, $email, $pwd, $pwdrp) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUID($username) !== false) {
        header("location: ../signup.php?error=invalidUID");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdrp) !== false) {
        header("location: ../signup.php?error=pwdunmatch");
        exit();
    }

    if (UIDexist($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $pwd);
    
}


else {
    header("location: ../signup.php");
}

?>