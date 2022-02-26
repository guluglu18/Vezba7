<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Stranica 1</h1>
    <?php
        require_once("funkcije.php");
        $db = @mysqli_connect("localhost","root","","php_vezba7");
        if(!$db){
            echo "Greska prilikom konekcije<br>";
            echo mysqli_connect_errno().": ".mysqli_connect_error();
        }
        else{
            mysqli_query($db, "SET NAMES utf8");
            echo "Uspesna konekcija na bazu!!!<br>";
            prikazKorisnika($db);
        }
    ?>
</body>
</html>