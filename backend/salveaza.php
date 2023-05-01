<?php
require "../includes/functions.php";
require "../includes/connect_database.inc.php";
if(!isset($_POST['salveaza']))
{
    header("location:../pages/index.php");
    exit();
}
foreach($_POST as $key => $value) {
    if (strpos($key, 'input-zi-') === 0) {
        $bucati = explode('-',$key);
        $idZi = $bucati[2];
        $numeZi = $value;
        if(sizeof($bucati)==3)
        {
            modificareZi($idZi,$numeZi,$conn);
        }
        else
        if(sizeof($bucati)==4)
        {
            adaugareZi($idZi,$numeZi,$conn);
        }
        
    }
}
foreach($_POST as $key => $value) {
    if (strpos($key, 'ex-') === 0) {
        $bucati = explode('-',$key);
        $idEx = $bucati[1];
        $numeEx = $value;
        if(strlen($numeEx)<=50)
        {
            if(sizeof($bucati)==3)
            {
                $zi = $bucati[2];
                modficareExercitiu($idEx,$numeEx,$conn);
            }
            else if(sizeof($bucati)==4)
            {
                $zi = $bucati[3];
                adaugareExercitiu($idEx,$numeEx,$conn,$zi);
            }
        }
    }
}
foreach($_POST as $key => $value) {
     if (strpos($key, 'greutate-') === 0) {
        $bucati = explode('-',$key);
        $greutate = $value;
        $idSet = $bucati[1];
        if(sizeof($bucati)==3)
        {
            $idEx = $bucati[2];
            $repetari = $_POST["repetare-".$idSet."-".$idEx];
            modficareSet($idSet,$greutate,$repetari,$conn);
        }
        else if(sizeof($bucati)==4)
        {
            $idEx = $bucati[3];
            $repetari = $_POST["repetare-".$idSet."-nou-".$idEx];
            adaugareSet($idSet,$idEx,$greutate,$repetari,$conn);
        }
     }
}
foreach($_POST as $key => $value) {
    if (strpos($key, 'sters-serie-') === 0) {
       $bucati = explode('-',$key);
       $id = $bucati[2];
       stergereSet($conn,$id);
    }
}
foreach($_POST as $key => $value) {
    if (strpos($key, 'sters-ex-') === 0) {
       $bucati = explode('-',$key);
       $id = $bucati[2];
       stergereEx($conn,$id);
    }
}
foreach($_POST as $key => $value) {
    if (strpos($key, 'sters-zi-') === 0) {
       $bucati = explode('-',$key);
       $id = $bucati[2];
       stergereZi($conn,$id);
    }
}
header("location:../pages/index.php");