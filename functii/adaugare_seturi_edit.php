<?php
$id_ex = $row["ID"];
?>
<script>
    var containerCuMinus = document.createElement('div');
</script>
<?php
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
        var minus = document.createElement('div');
        minus.classList.add('minus-serie');
        minus.classList.add(`minus-serie-${rowArraySeturi['ID']}`);
        minus.innerHTML='<i class="fa fa-times" aria-hidden="true"></i>';
        greutateDivCopil.style = "margin-top:5px";
        repetariDivCopil.style = "margin-top:5px";
        greutateDivCopil.innerHTML = `<input type = "text"  class = "greutate-${rowArraySeturi['ID']} greutate-${rowArraySeturi['ID_ex']}" name = "greutate-${rowArraySeturi['ID']}-${<?php echo $id_ex;?>}" value = ${rowArraySeturi['greutate']}></input>`;
        repetariDivCopil.innerHTML = `<input type = "text"  class = "repetari-${rowArraySeturi['ID']} repetari-${rowArraySeturi['ID_ex']}" name = "repetare-${rowArraySeturi['ID']}-${<?php echo $id_ex;?>}" value = ${rowArraySeturi['repetari']}></input>`;
        divGreutati.appendChild(greutateDivCopil);

        containerCuMinus = document.createElement('div')
        containerCuMinus.classList.add('container-cu-minus');
        containerCuMinus.appendChild(repetariDivCopil);
        containerCuMinus.appendChild(minus);

        divRepetari.appendChild(containerCuMinus);
    </script>
    <?php
}