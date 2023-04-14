<?php
$querySeturi = "SELECT * FROM seturi WHERE ID_ex = ? ORDER BY indice ASC";
$stmtSeturi = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtSeturi,$querySeturi))
{
    exit();
}
mysqli_stmt_bind_param($stmtSeturi,"s",$id_ex);
mysqli_stmt_execute($stmtSeturi);
$resultDataSeturi= mysqli_stmt_get_result($stmtSeturi);

mysqli_stmt_close($stmtSeturi);
?>