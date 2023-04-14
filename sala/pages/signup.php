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
    <title>Inregistrare</title>
</head>
<body>
    <div class="container-page">

            
            <?php
                require "..\includes\head_bar.inc.php";
            ?>
            <div class="container">
                <div class="title">
                    <h1>Inregistrare</h1>
                </div>
                    <form action="../backend/signup.inc.php" method="POST">
                        
                        <div class="wrapper">
                            <input type="text" name="username" placeholder="Username...">
                            <input type="text" name="email" placeholder="Email...">
                            <input type="password" name="password" placeholder="Password...">
                            <input type="password" name="rpassword" placeholder="Same password...">
                            <input type="submit" name = "submit" value="Trimite">
                        </div>

                    </form>
            </div>
    </div>
</body>
</html>