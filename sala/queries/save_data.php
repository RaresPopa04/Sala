<?php
    require_once "connect_database.php";

    $query = "UPDATE sala SET Exercitiu =?,Seturi=?,Greutate = ? WHERE ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "Something went wrong!";
        exit();
    }
    $cnt = 3;
    while($cnt<=78)
    {
        //nu ma lasa sa bag direct 1 asa ca trebuie sa fac o variabila
        $aux = $cnt/3;
        mysqli_stmt_bind_param($stmt,"sssi",$_POST[$cnt],$_POST[$cnt+1],$_POST[$cnt+2],$aux);
        if(mysqli_stmt_execute($stmt))
                echo ($cnt/3)."\n";
        else
            {
                echo "Something went wrong!\n";
                break;
            }
        $cnt+=3;
    }
?>