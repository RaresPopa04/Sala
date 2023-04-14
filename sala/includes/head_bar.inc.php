<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\style_bar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@1,300&display=swap" rel="stylesheet">

</head>
<body>
    <?php
    session_start();
    ?>
        <nav>
                <div class="nav-bar">
                    <a href="index.php" style="color:var(--lime-green);text-decoration: none;">
                    <div class="logo"><svg width="70px" height="70px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.4 7H4.6C4.26863 7 4 7.26863 4 7.6V16.4C4 16.7314 4.26863 17 4.6 17H7.4C7.73137 17 8 16.7314 8 16.4V7.6C8 7.26863 7.73137 7 7.4 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.4 7H16.6C16.2686 7 16 7.26863 16 7.6V16.4C16 16.7314 16.2686 17 16.6 17H19.4C19.7314 17 20 16.7314 20 16.4V7.6C20 7.26863 19.7314 7 19.4 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 14.4V9.6C1 9.26863 1.26863 9 1.6 9H3.4C3.73137 9 4 9.26863 4 9.6V14.4C4 14.7314 3.73137 15 3.4 15H1.6C1.26863 15 1 14.7314 1 14.4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 14.4V9.6C23 9.26863 22.7314 9 22.4 9H20.6C20.2686 9 20 9.26863 20 9.6V14.4C20 14.7314 20.2686 15 20.6 15H22.4C22.7314 15 23 14.7314 23 14.4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg> 
                    </a>
                  </div>
                   
                  
                    <ul>
                        <?php
                        if(!isset($_SESSION['ID']))
                            echo'
                            <li class ="elem1">
                            <div class="bar-1"></div>
                            <div class="text">Inregistrare</div>
                            <div class="bar-2"></div>
                        </li>
                        <li class ="elem2">
                            <div class="bar-1"></div>
                            <div class="text">Logare</div>
                            <div class="bar-2"></div>
                        </li>';
                        else
                        {
                            
                            echo'
                            <li class ="elem3">
                            <div class="bar-1"></div>
                            <div class="text">Delogare</div>
                            <div class="bar-2"></div>
                        </li>
                        <li class ="elem4">
                            <div class="bar-1"></div>
                            <div class="text">Cont</div>
                            <div class="bar-2"></div>
                        </li>';
                        }
                        ?>
                            
                         <li><div class="bar-1"></div>
                            <div class="text">Contact</div>
                            <div class="bar-2"></div></li>
                    </ul>
                </div>

        
    </nav>
    <script>
        const button3 =document.querySelector('.elem3');
        console.log(1);
        if(button3)
        {
            button3.addEventListener('click',()=>
            {
                window.location.href = 'logout.php';
            })
        }
        const button2 =document.querySelector('.elem2');
        if(button2)
        { 
            button2.addEventListener('click',()=>
            {
                window.location.href = 'login.php';
            })
        }   
        const button1 =document.querySelector('.elem1');
        if(button1)
        {
            button1.addEventListener('click',()=>
            {
                window.location.href = 'signup.php';
            })

        }
    </script>
</body>
</html>