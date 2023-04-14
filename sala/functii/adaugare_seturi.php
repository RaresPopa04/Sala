<?php
$id_ex = $row["ID"];
require "../queries/get_seturi.php";
while($rowSeturi = mysqli_fetch_assoc($resultDataSeturi))
{
    $rowSeturiJson = json_encode($rowSeturi);
    ?>
    <script>
        <?php echo "var divGreutati = document.querySelector('.rand-".$id_ex." .col .greutati');";
        echo "var divRepetari = document.querySelector('.rand-".$id_ex." .col .repetari');";
        echo "var rowArraySeturi =".$rowSeturiJson.";";
        ?>
        var greutateDivCopil = document.createElement('div');
        var repetariDivCopil = document.createElement('div');
        greutateDivCopil.style = "margin-top:5px";
        repetariDivCopil.style = "margin-top:5px";
        greutateDivCopil.innerText = rowArraySeturi['greutate'];
        repetariDivCopil.innerText = rowArraySeturi['repetari'];
        $(divGreutati).append(greutateDivCopil);
        $(divRepetari).append(repetariDivCopil);
    </script>
    <?php
}