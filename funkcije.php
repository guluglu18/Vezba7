<?php
    function Konekcije(){
        $db = @mysqli_connect("localhost","root","","php_vezba7");
        if(!$db){
            echo "Neuspela konekcija na bazu!!!<br>";
            echo mysqli_connect_errno().": ".mysqli_connect_error();
            return false;
        }
        mysqli_query($db, "SET NAMES utf8");
        return $db;
    }
  function prikazKorisnika($db){
    $upit = "SELECT * FROM korisnici";
    $odg = mysqli_query($db, $upit);
    if(mysqli_error($db)){
        echo "Greksa!!<br>".mysqli_error($db);
    }
    else{
        echo "Broj zapisa: ".mysqli_num_rows($odg)."<br>";
        while($red = mysqli_fetch_array($odg, MYSQLI_ASSOC)){
            echo $red['id'].": ".$red['ime']." ".$red['prezime']."(".$red['status'].") ";
            echo ($red['komentar']=="")?"<br>":" - ".$red['komentar']."<br>";
        }
    }
    
  }
?>