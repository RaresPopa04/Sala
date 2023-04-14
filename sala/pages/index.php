<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\style_main_page.css">
    <title>Sala</title>
</head>
<body>
    <div class="container">
        <?php require '..\includes\head_bar.inc.php'?>
        <div class="table">
            <?php
            if(isset($_SESSION['ID']))
            {
                $id = $_SESSION['ID'];
                $numar_zile = numarZile($id);
               require "../functii/adaugare_zile.php";
                ?>
                <script>
                    window.zile = document.querySelectorAll('.container-zile');
                </script>
                <?php
                require "../functii/populare_cu_zile.php";


                echo 
                '<div class="button-container" style = "text-align:center">
            
                <div class="buton">
                 <div class="bar-1"></div>
                  <div class="edit-button">
                    <a href="edit.php">Editeaza</a>
                 </div>
                 <div class="bar-2"></div>
                </div>
                </div>';
            }
            else
            {
                echo"la logare fraiere";
            }
            ?>
            </div>
            
        </div>
        
    </div>

    <script defer>
        const buton =document.querySelector('.buton');
        console.log(1);
        if(buton)
        {
            buton.addEventListener('click',()=>
            {
                window.location.href = 'edit.php';
            })
        }
    </script>
</body>
</html>
<?php
function numarZile($id)
{
    require "..\includes\connect_database.inc.php";
    $query = "SELECT * FROM useri WHERE ID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("location:..\pages\index.php?error=tryAgain");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    $row=mysqli_fetch_assoc($resultData);
    if(!$row)
    {
        echo "trebuie sa adaugi zile";
        return;
    }
    if($row['numar_zile']===0)
    {
        echo "trebuie sa adaugi zile";
    }
    return $row['numar_zile'];
}