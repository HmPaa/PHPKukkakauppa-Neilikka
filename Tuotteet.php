<?php include_once("suojaamaton_sivu.php");
include_once "start.php";
$query="SELECT * FROM tuotekategoria";
$tulos=mysqli_query($yhteys, $query);
if(!$tulos){
    die("Tiedon hakeminen ei onnistunut: " . mysqli_error($yhteys));
}
?>
<?php while($row=mysqli_fetch_array($tulos)){
    echo "<a href='tuotesivu.php?tuotekategoria=" . $row['tuotekategoria'] . "'><div class=sailio>";
        echo "<img src='" . $row['kuva'] . "'>";
        echo "<div class='kuvaus'>" . $row['tuotekategoria'] . "</div>";
        echo "<div id='tuotekuvaus'>"  . $row['kuvaus'] . "</div>";
    echo "</div></a>";
}
?>
<?php $yhteys->close();?>
<?php include_once "footer.html";?>