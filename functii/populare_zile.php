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
            ziDePopulat= document.querySelector(`.container-zi-${zi}`);
            var newRand = document.createElement('div');
            newRand.innerHTML = `
            <div class='rand rand-${rowArray['ID']}'> 
                <div class='col'>${rowArray['Exercitiu']}</div> 
                <div class = "grupare">
                    <div class='col'>
                            <div class = "greutati">
                            </div>
                    </div> 
                    <div class='col'>
                            <div class = "repetari">
                            </div>
                    </div>
                </div>
            
            <div class ="linie"></div>
            </div>`;
        ziDePopulat.appendChild(newRand);
        </script>
        <?php
        require "adaugare_seturi.php";
    }