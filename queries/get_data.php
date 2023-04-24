<?php
$query = "SELECT * FROM sala WHERE IDUser = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$query))
{
    exit();
}
mysqli_stmt_bind_param($stmt,"s",$id);
mysqli_stmt_execute($stmt);
$resultData = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);
?>