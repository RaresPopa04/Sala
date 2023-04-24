<?php
 $idUserDinZile = $_SESSION["ID"];
 require "../queries/get_zile.php";
 $cnt =0;
 while($row = mysqli_fetch_assoc($resultData))
 {
    $cnt++;
     echo '
     <div class="container-zile container-zi-'.$row['ID'].'">
         <div class="sectiune">
             <div class = "subtitlu">
                 <div class ="titlu-zi"> Ziua '.$row['nume'].'</div>
             </div>
             <div class="rand">
                 <div class="col cap-tabel">
                     <div class = "titlu-sectiune">Exercitiu</div>
                 </div>
                 <div class="grupare-1">
                    <div class="col cap-tabel">
                        <div class = "titlu-sectiune">Greutate</div>
                    </div>
                    <div class="col cap-tabel">
                        <div class = "titlu-sectiune">Repetari</div>
                    </div> 
                 </div> 
             </div>
             <div class = "linie"></div>  
         </div>
     </div>'
     ;
 }
 