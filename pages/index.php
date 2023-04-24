<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\style_main_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Exercitii</title>
</head>
<body>
    <div class="container">
        <?php require '..\includes\head_bar.inc.php';
            require '../includes/connect_database.inc.php';
        ?>
        <div class="table" style = "font-family:'Inter' ,sans-serif;">
            <?php
            if(isset($_SESSION['ID']))
            {
                $id = $_SESSION['ID'];
               require "../functii/adaugare_zile.php";
                require "../functii/populare_zile.php";
                
                if($cnt ===0)
                {
                    echo "<div class ='container-fara-cont'>
                        <h1>Nu ai zile adaugate</h1>
                        <h1><i class='fa fa-arrow-down' aria-hidden='true'></i><h1>
                    </div>";
                }


                echo 
                '<div class="button-container" style = "text-align:center">
            
                  <div class="edit-button">
                    <a href="edit.php">Editeaza</a>
                    </div>
                </div>';
            }
            else
            {
                ?>
                <div class="container-fara-cont">
                    <h1>Nu esti logat</h1>
                    <ul>
                        <li class ="btn1">
                            <div class="bar-1"></div>
                            <div class="text">Inregistrare</div>
                            <div class="bar-2"></div>
                        </li>
                        <li class ="btn2">
                            <div class="bar-1"></div>
                            <div class="text">Logare</div>
                            <div class="bar-2"></div>
                        </li>
                    </ul>
                    
                </div>
                <?php
            }
            ?>
            </div>
            
        </div>
        
    </div>

    <script defer>
        const buton =document.querySelector('.button-container');
        if(buton)
        {
            buton.addEventListener('click',()=>
            {
                window.location.href = 'edit.php';
            })
        }
        const button21 =document.querySelector('.btn2');
        if(button21)
        { 
            button21.addEventListener('click',()=>
            {
                window.location.href = 'login.php';
            })
        }   
        const button11 =document.querySelector('.btn1');
        if(button1)
        {
            button11.addEventListener('click',()=>
            {
                window.location.href = 'signup.php';
            })

        }
    </script>
</body>
</html>