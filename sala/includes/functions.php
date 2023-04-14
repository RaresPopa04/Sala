<?php

function isEmptyInput($username,$email,$password,$rpassword)
{
    if(empty($username)||empty($email)||empty($password)||empty($rpassword))
    {
        return true;
    }
    return false;
}

function isEmptyInputLogin($username,$password)
{
    if(empty($username) || empty($password))
    {
        return true;
    }
    return false;
}

function isValidUsername($username)
{
    if(preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        return true;
    }
    return false;
}
function isValidEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}
function matchPasswords($pass1,$pass2)
{
    if($pass1!=$pass2)
        return false;
    return true;
}
function userExists($conn, $username,$email)
{
    $query = "SELECT * FROM useri WHERE Username=? OR Email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\signup.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    if($row=mysqli_fetch_assoc($resultData))
        {
            return $row;

        }
    return false;


}
function connectUser($conn,$username,$email,$password)
{
    $query = "INSERT INTO useri(Username,Email,Password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\signup.php?error=tryAgain");
        exit();
    }
    $password1 = password_hash($password,PASSWORD_DEFAULT);
    echo($email);
    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$password1);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:..\pages\index.php");
}
function loginUser($conn,$username,$password)
{
    $result = userExists($conn,$username,$username);
    if($result===false)
    {
        header("location:..\pages\login.php?error=noUser");  
        exit();
    }
    $password2 = $result["Password"];
    if(password_verify($password,$password2))
    {
        session_start();
        $_SESSION['ID'] = $result["ID"];
        $_SESSION['username'] = $result["Username"];
        header("location:..\pages\index.php");
        exit();  
    }

}