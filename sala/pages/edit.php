<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_main_page.css">
    <title>Sala</title>
</head>
<body>
    <div class="container">
        
        <?php
        require 'head_bar.html';
        require "connect_database.php";
        require "get_data.php";
        ?>
        
            <div class="table">
                <form action="#" class = "typing-area">
                    <?php   
                        $cnt = 1;
                        $row= mysqli_fetch_assoc($resultData);
                        while($row)
                        {
                         echo'<div class="sectiune">';
                          echo '<div class = "subtitlu"><h1>Ziua '.$cnt.'</h1></div>';
                         echo '
                         <div class="rand">
            
                         <div class="col cap-tabel"><h2>Exercitiu</h2></div>
                            <div class="col cap-tabel"><h2>Greutate</h2></div>
                            <div class="col cap-tabel"><h2>Repetari</h2></div>    
                        </div>';
                         while(($cnt==$row['Id_zi']))
                         {
                            echo "
                            <div class='rand'>
                            <td><input type='text' value='".$row['Exercitiu']."'name=".($cnt*3)."></td>
                            <td><input type='text' value='".$row['Seturi']."'name=".($cnt*3+1)."></td>
                            <td><input type='text' value='".$row['Greutate']."'name=".($cnt*3+2)."></td>
                            </div>";
                            $row =mysqli_fetch_assoc($resultData);
                            if(!$row)
                                break; 
                         }
                         $cnt++;
                         echo'</div>';
                        }

                    ?>
                
                </form>
                
                    </div>
            
            <a href = "" id = "saveBtn">Salveaza</a>
        
    </div>
    <script src = "saveData.js"></script>
</body>
</html>