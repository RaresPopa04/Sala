<?php
?>
<?php
require '..\includes\connect_database.inc.php';
require '../queries/get_data.php';
?>
    <script> 
        var ziDePopulat;
    </script>
<?php
    while($row=mysqli_fetch_assoc($resultData))
    {
        $rowToJson = json_encode($row);
        ?>
        <script>
            <?php echo "var rowArray =".$rowToJson.";" ?>
            var zi = rowArray['Id_zi'];
            var idEx = rowArray['ID'];
            ziDePopulat= document.querySelector(`.container-zi-${zi}`);
            var newRand = document.createElement('div');
            newRand.innerHTML = `
            <div class='rand rand-${rowArray['ID']}'> 
                <div class='col'>
                
                    <div class = "grupare-operatii" style="margin-bottom:5px">
                        <div class = "plus-serii plus-serii-${rowArray['ID']}">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </div>
                        <div class = "minus-exercitiu minus-exercitiu-${rowArray['ID']}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type = "text" value = "${rowArray['Exercitiu']}" name = "ex-${idEx}-${zi}"></input>
                </div> 
                <div class ="grupare">
                    <div class='col'>
                            <div class = "greutati">
                            </div>
                    </div> 
                    <div class='col'>
                            <div class = "repetari">
                            </div>
                    </div>
                </div>
                <div class = "linie"></div>
            </div>`;
            ziDePopulat.append(newRand);
        </script>
        <?php
        require "adaugare_seturi_edit.php";
    }

