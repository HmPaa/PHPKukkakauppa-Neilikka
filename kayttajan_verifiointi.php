<?php 
include_once "Kayttajan_aktivointi.php";
include_once "Header.php";

echo "<h3>".$email_already_verified."</h3>";
echo "<h3>".$email_verified."</h3>";
echo "<h3>".$activation_error."</h3>"; 

include_once "footer.html";
?>