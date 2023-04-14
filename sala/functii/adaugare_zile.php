<?php
 $cnt = 0;
 while($numar_zile)
 {

     $numar_zile--;
     $cnt++;
     echo '
     <div class="container-zile container-zi-'.$cnt.'">
         <div class="sectiune">
             <div class = "subtitlu">
                 <h1>Ziua '.$cnt.'</h1>
             </div>
             <div class="rand">
                 <div class="col cap-tabel">
                     <h2>Exercitiu</h2>
                 </div>
                 <div class="col cap-tabel">
                     <h2>Greutate</h2>
                 </div>
                 <div class="col cap-tabel">
                     <h2>Repetari</h2>
                 </div>  
             </div>  
         </div>
     </div>'
     ;
 }