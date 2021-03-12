<?php include_once "header.php" ?>
<?php include_once "start.php" ?>
<div class="content"><?php
if( isset($_POST["submit"]) ) {
    $nimi=$yhteys->real_escape_string(strip_tags($_POST["nimi"]));
    $sahkoposti=$yhteys->real_escape_string(strip_tags($_POST["email"]));
    $aihe=$yhteys->real_escape_string(strip_tags($_POST["aihe"]));
    $vapaa_teksti=$yhteys->real_escape_string(strip_tags($_POST["viesti"]));
    $query="INSERT INTO yhteydenotot (Nimi, Sahkoposti, Aihe, Vapaa_teksti) VALUES 
    ('$nimi', '$sahkoposti', '$aihe', '$vapaa_teksti')";   
    $tulos=$yhteys->query($query);
        if($tulos == TRUE){
            echo "<p>Kiitos yhteydenotosta, " . $_POST["nimi"] . "!<br>";
            echo "Palaamme sinulle mahdollisimman pian!</p>";;
        }else {
            echo "Virhe: " . $query . "<br>" . $yhteys->error . "<br>";
        }   
}

$yhteys->close();
?>
<?php include_once "footer.html" ?>

