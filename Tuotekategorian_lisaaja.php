<?php 
if(isset($_POST["TKsubmit"]) ) {
      $kategoria=$yhteys->real_escape_string(strip_tags($_POST["uusiTuotekategoria"]));
      $query="SELECT id FROM tuotekategoria WHERE tuotekategoria = ('$kategoria')";
      $tulos=$yhteys->query($query);
      if($tulos->num_rows == 0) {
        $query="INSERT INTO tuotekategoria (tuotekategoria) VALUES 
        ('$kategoria')";   
        $tulos=$yhteys->query($query);
            if($tulos == TRUE){
                echo "Tuotekategoria \"" . $_POST["uusiTuotekategoria"] . "\" on lisätty uutena tuotekategoriana.<br>";
              }
      } else {
        echo "Tuotekategoria \"" . $kategoria . "\" on jo olemassa.";
      }      
    }
    ?>