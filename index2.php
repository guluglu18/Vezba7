<?php
    require_once("funkcije.php");
    if(!$db=Konekcije()){
        exit();
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
    <h1>Stranica 2</h1>
    <form action="index2.php" method="post">
        <input type="text" name="ime" id="ime" placeholder="Unesite ime:"><br><br>
        <input type="text" name="prezime" id="prezime" placeholder="Unesite preime:"><br><br>
        <input type="email" name="email" id="email" placeholder="Unesite email:"><br><br>
        <input type="text" name="loznika" id="loznika" placeholder="Unesite lozniku:"><br><br>
        <select name="status" id="status">
            <option value="0">Izaberite status</option>
            <option value="Administrator">Administrator</option>
            <option value="Korisnk">Korisnk</option>
            <option value="Urednik">Urednik</option>
        </select><br><br>
    <textarea name="komentar" id="komentar" cols="20" rows="5" placeholder="Unesite komentar:"></textarea><br><br>
    <button name="dugme">Snimi podatke</button>
    </form>
    <?php
        if(isset($_POST['dugme'])){
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $email = $_POST['email'];
            $loznika = $_POST['loznika'];
            $status = $_POST['status'];
            $komentar = $_POST['komentar'];
            if($ime!="" and $prezime!="" and $komentar and $loznika!="" and $email!="0"){
                $upit = "INSERT INTO korisnici (ime,prezime,email, lozinka, status, komentar) VALUES ('$ime', '$prezime', '$email', '$loznika', '$status', '$komentar')";
                $obj = mysqli_query($db, $upit);
                    if(mysqli_error($db)){
                        echo "GRESKA prilikom kreiranja upita:".mysqli_error($db)."<br>";
                    }
                    else{
                        echo "Dodato redova: ".mysqli_affected_rows($db)."<br>";
                        echo "Poslednji index: ".mysqli_insert_id($db)."<br>";
                    }
            }
            else{
                echo "Svi podaci su obavezni!<br>";
            }
        }
        
            prikazKorisnika($db)
    ?>
</body>
</html>