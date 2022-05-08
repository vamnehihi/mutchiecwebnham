<?php

function emptyInputSignup($username, $email, $pwd, $pwdrp)
{
    $result;
    if (empty($username) || empty($email) || empty($pwd) || empty($pwdrp)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidUID($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9.]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function pwdMatch($pwd, $pwdrp)
{
    $result;
    if ($pwd !== $pwdrp) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function UIDexist($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUID = ? or usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $username, $email, $pwd)
{
    $sql = "INSERT INTO users (usersUID, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function loginUser($conn, $username, $pwd)
{
    $UIDexist = UIDexist($conn, $username, $username);

    if ($UIDexist === false){
        header("location: ../login.php?error=wronglogin");
        exit(); 
    }

    $pwdHashed = $UIDexist["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $UIDexist["usersID"];
        $_SESSION["useruid"] = $UIDexist["usersUID"];
        header("location: ../index.php");
        exit();
    }
}
?>