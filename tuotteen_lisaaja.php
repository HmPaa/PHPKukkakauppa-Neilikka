<?php

if(isset($_POST["submit"])){
$target_dir = 'kuvat/';
$target_file = $target_dir . basename($_FILES['kuva']['name']);
$filename = $_FILES['kuva']['name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES['kuva']['tmp_name']);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Tiedosto ei ole kuva. ";
    $uploadOk = 0;
  }
if (file_exists($target_file)) {
    echo "Saman niminen kuva on jo tallennettu. ";
    $uploadOk = 0;
  }
// Check file size
if ($_FILES['kuva']['size'] > 500000) {
    echo "Tarkista kuvan koko. Suurin mahdollinen koko 5MB. ";
    $uploadOk = 0;
  }
  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Kuvan tulee olla muotoa JPG, JPEG, PNG tai GIF. ";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Kuvan tallennus uutena kuvana ei onnistunut. ";
  //if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["kuva"]["tmp_name"], $target_file)) {  
    } else {
      echo "Kuvan tallennus ei onnistunut. ";
    }
  }
  $nimi=$yhteys->real_escape_string(strip_tags($_POST["nimi"]));
      $kuvaus=$yhteys->real_escape_string(strip_tags($_POST["kuvaus"]));
      $hinta=$yhteys->real_escape_string(strip_tags($_POST["hinta"]));
      $kategoria=$_POST['kategoria'];
      $query="INSERT INTO tuotteet (nimi, kuvaus, hinta, kategoria_id, kuva) VALUES 
      ('$nimi', '$kuvaus', '$hinta', (SELECT id FROM tuotekategoria WHERE tuotekategoria='$kategoria'), '$target_file')";   
      $tulos=$yhteys->query($query);
          if($tulos == TRUE){
              echo "Tuote " . $_POST["nimi"] . " on lisätty valikoimaan.<br>";
          }else {
              echo "Virhe: " . $query . "<br>" . $yhteys->error . "<br>";
          }  

}
?>

