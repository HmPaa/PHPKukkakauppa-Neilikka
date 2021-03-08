
<?php
include_once "header.php";
include_once "start.php";
$kategoria=$_GET["tuotekategoria"];
?>
<h2><?php echo $kategoria;?></h2>    
<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
} 
$no_of_records_per_page = 3;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tuotteet WHERE kategoria_id=(SELECT id FROM tuotekategoria WHERE tuotekategoria='$kategoria')";
$tulos = mysqli_query($yhteys,$total_pages_sql);
$total_rows = mysqli_fetch_array($tulos)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


$query="SELECT * FROM tuotteet WHERE kategoria_id=(SELECT id FROM tuotekategoria WHERE tuotekategoria='$kategoria') LIMIT $offset, $no_of_records_per_page";
$tulos=mysqli_query($yhteys, $query);
if(!$tulos){
    die("Tiedon hakeminen ei onnistunut: " . mysqli_error($yhteys));
}
echo "<div class=tuoterivi>";
while($row=mysqli_fetch_array($tulos)){
    echo "<div class=sailio>";
        echo "<img src=" . $row['kuva'] . ">";
        echo "<div class='kuvaus'>" . $row['nimi'] . "</div>";
        echo "<div id='tuotekuvaus'>" . $row['kuvaus'] . "<br></div>";
        echo "<div id='hinta'>" . $row['hinta'] . " €/kpl</div>";
    echo "</div>";    
}
echo "</div>";
?>
<nav>
<ul class="sivutus">
    <li><a href="?tuotekategoria=<?php echo $kategoria;?>&pageno=1"><i class="fa fa-angle-double-left"></i></a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?tuotekategoria=" . $kategoria . "&pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left"></i></a>
    </li>
    <li><?php echo $pageno . "/" . $total_pages?></li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?tuotekategoria=" . $kategoria . "&pageno=".($pageno + 1); } ?>"><i class="fa fa-angle-right"></i></a>
    </li>
    <li><a href="?tuotekategoria=<?php echo $kategoria;?>&pageno=<?php echo $total_pages; ?>"><i class="fa fa-angle-double-right"></i></a></li>
</ul>
</nav>
<?php $yhteys->close();?>
<?php include_once "footer.html";?>