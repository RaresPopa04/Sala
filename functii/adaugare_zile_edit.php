<?php
 $idUserDinZile = $_SESSION["ID"];
 require "../queries/get_zile.php";
 $cnt = 0;
 while($row = mysqli_fetch_assoc($resultData))
 {
    $cnt++;
     echo '
     <div class="container-zile container-zi-'.$row['ID'].'">
         <div class="sectiune">
             <div class = "subtitlu">
                 <div class = "titlu-zi"> 
                 <div class = "grupare-operatii">
                    <div class="minus-'.$row['ID'].' minus-zi"><i class="fa fa-trash" aria-hidden="true"></i></div>
                 </div>
                 Ziua 
                 <input type = "text" placeholder = "Nume zi ..." value = "'.$row['nume'].'"  name = input-zi-'.$row['ID'].'></div>
             </div>
             <div class="rand">
                 <div class="col cap-tabel">
                    <div class="plus-'.$row['ID'].' plus-ex"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                    <div class ="titlu-sectiune">Exercitiu</div>
                 </div>
                 <div class="grupare-1">
                    <div class="col cap-tabel">
                        <div class ="titlu-sectiune">Greutate</div>
                    </div>
                    <div class="col cap-tabel">
                        <div class ="titlu-sectiune">Repetari</div>
                    </div> 
                 </div> 
             </div>  
         </div>
         <div class="linie"></div>
     </div>'
     ;
 }