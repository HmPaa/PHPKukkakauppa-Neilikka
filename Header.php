<!DOCTYPE html>
<html lang="fi">

<?php
$sivu = $_SERVER['PHP_SELF'];
$loppuosa = substr($sivu,strrpos($sivu,"/") + 1);
$osoite = substr($loppuosa,0,strpos($loppuosa,"."));
$valittu = "class=\"valittu\"";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puutarhaliike Neilikka</title>
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascript.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Lato&display=swap" rel="stylesheet">

</head>

<?php
if($suojattu_sivu){
?>
<body>
<header>
        <h1>Kukkatalo Neilikka</h1>
    </div>
    <div class="topnav" id="myTopnav">
        <a class="active" href="index.php">Koti</a>
        <a <?php if ($osoite == "Tuotteet") echo $valittu;?> href="Tuotteet.php">Tuotteet</a>
        <a <?php if ($osoite == "Myymalat") echo $valittu;?> href="Myymalat.php">Myymälät</a>
        <a <?php if ($osoite == "Tietoameista") echo $valittu;?> href="Tietoameista.php">Tietoa meistä</a>
        <a <?php if ($osoite == "yhteystiedot") echo $valittu;?> href="yhteystiedot.php">Ota yhteyttä</a>
        <a id="tyontekijoille"<?php if ($osoite == "tyontekijoille") echo $valittu;?> href="dashboard.php">Käyttäjätiedot</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    </header>
    <body>
    <div class="content">    
<?php 
include_once("kulunvalvonta.php");
} else {?>


<body>
<header>
        <h1>Kukkatalo Neilikka</h1>
    </div>
    <div class="topnav" id="myTopnav">
        <a class="active" href="index.php">Koti</a>
        <a <?php if ($osoite == "Tuotteet") echo $valittu;?> href="Tuotteet.php">Tuotteet</a>
        <a <?php if ($osoite == "Myymalat") echo $valittu;?> href="Myymalat.php">Myymälät</a>
        <a <?php if ($osoite == "Tietoameista") echo $valittu;?> href="Tietoameista.php">Tietoa meistä</a>
        <a <?php if ($osoite == "yhteystiedot") echo $valittu;?> href="yhteystiedot.php">Ota yhteyttä</a>
        <a id="tyontekijoille"<?php if ($osoite == "tyontekijoille") echo $valittu;?> href="tyontekijoille.php">Työntekijöille</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    </header>
    <body>
    <div class="content">
    <?php } ?>