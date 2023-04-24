<?php
 require '../includes/connect_database.inc.php';

 if(!isset($_POST['submit']))
 {
    header("location: ..\pages\login.php");
    exit();
 }
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $rpassword = $_POST['rpassword'];

include '../includes/functions.php';
if(isEmptyInput($username,$email,$password,$rpassword))
{
    header("location:..\pages\signup.php?error=emptyInput");
    exit();
}
if(!isValidUsername($username))
{
    header("location:..\pages\signup.php?error=invalidUsername");
    exit();
}
if(!isValidEmail($email))
{
    header("location:..\pages\signup.php?error=invalidEmail");
    exit();
}
if(!matchPasswords($password,$rpassword))
{
    header("location:..\pages\signup.php?error=nmcPasswords");
    exit();
}
if(userExists($conn, $username,$email)!==false)
{
    header("location:..\pages\signup.php?error=userExists");
    exit();
}
if(strlen($username)>50 || strlen($email)>50)
{
    header("location:..\pages\signup.php?error=preaLung");
    exit();
}
connectUser($conn,$username,$email,$password);