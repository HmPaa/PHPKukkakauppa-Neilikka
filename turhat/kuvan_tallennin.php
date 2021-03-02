<?php
$target_dir = 'kuvat/';
$target_file = $target_dir . basename($_FILES['kuva']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["kuva"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Tiedosto ei ole kuva.";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
    echo "Saman niminen kuva on jo ladattu.";
    $uploadOk = 0;
  }
// Check file size
if ($_FILES["kuva"]["size"] > 500000) {
    echo "Tarkista kuvan koko. Suurin mahdollinen koko 5MB.";
    $uploadOk = 0;
  }
  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Kuvan tulee olla muotoa JPG, JPEG, PNG tai GIF.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Kuvan tallennus ei onnistu.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["kuva"]["tmp_name"], $target_file)) {
      echo "Tiedosto ". htmlspecialchars( basename( $_FILES["kuva"]["name"])). " on tallennettu.";
    } else {
      echo "Kuvan tallennus ei onnistunut.";
    }
  }
?>  