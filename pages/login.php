<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\form-css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Kanit:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>Logare</title>
</head>
<body>
    <div class="container-page">

            
            <?php
                require "..\includes\head_bar.inc.php";
            ?>
            <div class="container">
                <div class="title" style = "margin-bottom:30px">
                    <h1>Logare</h1>
                </div>
                    <form action="../backend/login.inc.php" method="POST">
                        
                        <div class="wrapper">
                            <input type="text" name="username" placeholder="Username/Email...">
                            <input type="password" name="password" placeholder="Password...">
                            <?php
                                if(isset($_GET['error']))
                                {
                                    $error = $_GET['error'];
                                    if($error==="noUser")
                                    {
                                        $deAfisat = "Username/Email nu este inregistrat";
                                    }
                                    else if($error==="emptyInput")
                                    {
                                        $deAfisat = "Completati campurile";
                                    }
                                    else if($error==="preaLung")
                                    {
                                        $deAfisat = "Input prea lung";
                                    }
                                    echo  "<div class = 'eroare' style = 'color:red; margin-bottom:5px; text-align:center;'>".$deAfisat."</div>";
                                }
                                
                            ?>
                            <input type="submit" name = "submit" value="Trimite">
                        </div>

                    </form>
            </div>
    </div>
</body>
</html>