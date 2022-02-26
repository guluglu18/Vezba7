<?php
    require_once("funkcije.php");
    if(!$db=Konekcije()){
        exit();
    }
?>
<?php
    if(isset($_POST['dugme'])){
        $idKor=$_POST['idKor']; 
        if($idKor==0){
            echo "<br>Morate izabrati korisnika za brisanje<br>";
        }
        else{
            $upit="DELETE FROM korisnici WHERE id=$idKor";
            mysqli_query($db, $upit);
            if(mysqli_error($db)){
                echo "Greska!".mysqli_error($db);
            }
            else{
                echo "Izbrisano zapisa:".mysqli_affected_rows($db)."<br>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Stranica 3</h1>
    <form action="index3.php" method="post">
        <select name="idKor" id="idKor">
            <option value="0">--Izaberite kosisnika za brisanje--</option>
            <?php
            $upit="SELECT * FROM korisnici ORDER BY prezime ASC";
            $rez = mysqli_query($db, $upit);
            while($red=mysqli_fetch_array($rez, MYSQLI_ASSOC)){
                echo "<option value='{$red['id']}'>{$red['ime']} {$red['prezime']}</option>";
            }
            ?>
        </select><br><br>
        <button name="dugme">Obrisite podatak</button>
    </form>
    
    <?php
        prikazKorisnika($db);
    ?>
</body>
</html>