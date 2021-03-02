<?php 
/*** Tietokantaliitäntä */
function debuggeri($arvo){
    if(defined('DEBUG') and !DEBUG) return;
    $msg = is_array($arvo) ? var_export($arvo,true):$arvo;
    $msg = date("Y-m-d H:i:s")." ".$msg;
    file_put_contents("debug_log.txt", $msg."\n",FILE_APPEND); 
}

define('DEBUG',1);
$local = in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'REMOTE_ADDR' =>'::1'));

if(!$local){
    $kayttaja = "azure";  
    $salasana = "salasana";
    $server = "localhost:50431";
    $tietokanta = "yhteydenotot_neilikka";
} else {

    $palvelin = "localhost";
    $kayttaja = "root";  // tämä on tietokannan käyttäjä, ei tekemäsi järjestelmän
    $salasana = "k,p3Le-uGia9N+s";
    $tietokanta = "yhteydenotot_neilikka";
}
//try{
    $yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
    /*if($yhteys->connect_error){
        throw new Exception("Virhe tietokantayhteydessä",42);
    }
} catch (Exception $e) {
    if(defined ('DEBUG') and DEBUG)
    echo "Poikkeus ".$e->getCode().": ".$e->getMessage()." " . 
    "rivillä ". $e->getLine()", tiedosto: "$e->getFile()."<br> />";
    else echo "Virhe tietokantayhteydessä. Yritä hetken päästä uudelleen.<br>";
    exit;
} */
// luo yhteys
//$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

// jos yhteyden muodostaminen ei onnistunut, keskeytä
if ($yhteys-> connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
// aseta merkistökoodaus (muuten ääkköset sekoavat)
$yhteys->set_charset("utf8"); ?>