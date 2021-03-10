<?php
global $suojattu_sivu;
if(session_status() === PHP_SESSION_NONE) session_start();
if(empty($_SESSION['kayttajatunnus'])){
    $suojattu_sivu=FALSE;
} else {
$suojattu_sivu=TRUE;
}
include_once "header.php";
?>

