 <?php
 if(!isset($_POST['submit']))
 {
     header("location:..\pages\login.php");
     exit();
 }
 $username = $_POST['username'];
 $passwordlogin = $_POST['password'];
 
 require "../includes/connect_database.inc.php";
 include "../includes/functions.php";
 if(isEmptyInputLogin($username,$passwordlogin)!==false)
 {
    header("location:..\pages\login.php?error=emptyInput");
    exit();
 }
 loginUser($conn,$username,$passwordlogin); 
