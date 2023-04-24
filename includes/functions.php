<?php
require "../includes/head_bar.inc.php";
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
    else
    {
        header("location:..\pages\login.php?error=wrongPass");
        exit();   
    }

}
function modificareZi($idZi,$numeZi,$conn)
{
    $query = "UPDATE zile SET nume=? WHERE ID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$numeZi,$idZi);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}
function adaugareZi($idZi,$numeZi,$conn)
{
    $query = "INSERT INTO zile(ID,ID_user,nume) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    $ID = $_SESSION['ID'];
    mysqli_stmt_bind_param($stmt,"sss",$idZi,$ID,$numeZi);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function modficareExercitiu($idEx,$numeEx,$conn)
{
    $query = "UPDATE sala SET Exercitiu=? WHERE ID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$numeEx,$idEx);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}
function modificareGreutate($idGrupa,$greutate,$conn)
{
    $query = "UPDATE seturi SET greutate=? WHERE ID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$greutate,$idGrupa);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}
function modficareSet($idSet,$greutate,$repetari,$conn)
{
    $query = "UPDATE seturi SET repetari=?,greutate=? WHERE ID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$repetari,$greutate,$idSet);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}

function adaugareExercitiu($idEx,$numeEx,$conn,$zi)
{
    $query = "INSERT INTO sala(ID,Exercitiu,Id_zi,IDUser) VALUES (?, ?, ?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    $ID = $_SESSION['ID'];
    mysqli_stmt_bind_param($stmt,"ssss",$idEx,$numeEx,$zi,$ID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function adaugareSet($idSet,$idEx,$greutate,$repetare,$conn)
{
    $query = "INSERT INTO seturi(ID,ID_ex,repetari,greutate) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$idSet,$idEx,$greutate,$repetare);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function stergereSet($conn,$idSet)
{
    $query = "DELETE FROM seturi WHERE ID=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idSet);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function stergereEx($conn,$id)
{
    $query = "DELETE FROM sala WHERE ID=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function stergereZi($conn,$id)
{
    $query = "DELETE FROM zile WHERE ID=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\edit.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}