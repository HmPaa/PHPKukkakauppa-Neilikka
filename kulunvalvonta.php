<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

global $ei_sisaankirjausta;

if(isset($_POST['kayttajatunnus'])){
    $kayttajatunnus = $_POST['kayttajatunnus'];
} else if (isset($_SESSION['kayttajatunnus'])){
    $kayttajatunnus = $_SESSION['kayttajatunnus'];
}
if(isset($_POST['salasana'])){
    $ksalasana = isset($_POST['salasana']);
} else if (isset($_SESSION['salasana'])){
    $ksalasana = $_SESSION['salasana'];
}

if(!isset($kayttajatunnus) || !isset($ksalasana)){
    $ei_sisaankirjausta ="Tämä sivu vaatii sisäänkirjautumisen.";
    include("tyontekijoille.php"); 
    exit;   
}
include_once("start.php");
$sql = "SELECT * FROM kayttajat WHERE kayttajatunnus='$kayttajatunnus' && is_active=1";
$tulos=mysqli_query($yhteys, $sql);
if(!$tulos){
    include_once "header.php";
    echo "<h3>Käyttäjätunnusta ja salasanaa tarkistettaessa tapahtui tietokantavirhe. Yritä myöhemmin uudestaan.</h3>";
    include_once "footer.html";
}
if (mysqli_num_rows($tulos) == 0) {
    unset($_SESSION['kayttajatunnus']);
    unset($_SESSION['salasana']);
    include_once "header.php"; ?>
    <h2>Pääsy evätty</h2>
    <p>Käyttäjätunnusta ei löydy tai käyttäjätiliä ei ole vahvistettu. Yrittääksesi 
    sisäänkirjautumista uudestaan klikkaa 
    <a href="<?=$_SERVER['PHP_SELF']?>">tästä</a>. 
    Luodaksesi uuden käyttäjätilin klikkaa <a href="uusi_kayttaja.php">tästä</a>.</a></p>
    <?php include_once "footer.html"; 
exit;
}
while($row = mysqli_fetch_array($tulos)) {
    $email     = $row['email'];
    $_salasana    = $row['salasana'];
    $token         = $row['token'];
    $is_active     = $row['is_active'];
}

if($ksalasana != $_salasana){
    unset($_SESSION['kayttajatunnus']);
    unset($_SESSION['salasana']);
    include_once "header.php"; ?>
    <h2>Pääsy evätty</h2>
    <p>Salasana on väärin. Yrittääksesi 
    sisäänkirjautumista uudestaan klikkaa 
    <a href="<?=$_SERVER['PHP_SELF']?>">tästä</a>. 
    Luodaksesi uuden käyttäjätilin klikkaa <a href="uusi_kayttaja.php">tästä</a>.</a></p>
    <?php include_once "footer.html"; 
exit;
}
$_SESSION['salasana'] = $_salasana;
$_SESSION['kayttajatunnus'] = $kayttajatunnus;
$_SESSION['email'] = $email;
$_SESSION['token'] = $token;
?>
