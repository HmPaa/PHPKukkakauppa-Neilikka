<?php
include_once("suojaamaton_sivu.php");
include_once("start.php");

if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $salasana_hash = password_hash($pass, PASSWORD_BCRYPT);
  $query="UPDATE kayttajat SET salasana='$salasana_hash' WHERE md5(email)='$email'";
  $tulos=$yhteys->query($query);
  if(mysqli_affected_rows($yhteys)==1){
    echo "<h4>Salasana on vaihdettu onnistuneesti.</h4><br>";
}else {
    echo "Virhe: " . $query . "<br>" . $yhteys->error . "<br>";
}  
}
include_once("footer.html");    
?>