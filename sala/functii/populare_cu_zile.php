<?php
?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
require '..\includes\connect_database.inc.php';
require '../queries/get_data.php';
    while($row=mysqli_fetch_assoc($resultData))
    {
        $rowToJson = json_encode($row);
        ?>
        <script>
            <?php echo "var rowArray =".$rowToJson.";" ?>
            var zi = rowArray['Id_zi'];
            var newRand = document.createElement('div');
            newRand.innerHTML = `
            <div class='rand rand-${rowArray['ID']}'> 
            <div class='col'><h4>${rowArray['Exercitiu']}</h4></div> 
            <div class='col'>
                <h4>
                    <div class = "greutati">
                    </div>
                </h4>
            </div> 
            <div class='col'>
                <h4>
                    <div class = "repetari">
                    </div>
                </h4>
            </div>
            </div>`;
            window.zile[zi-1].append(newRand);
        </script>
        <?php
        require "adaugare_seturi.php";
    }