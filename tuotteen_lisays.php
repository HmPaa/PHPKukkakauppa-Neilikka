<?php
include("header.php");
include("start.php");
?>
<script type="text/javascript">
function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
<p>
<?php include("tuotekategorian_lisaaja.php");
     include("tuotteen_lisaaja.php"); ?>
</p>     
    <h2>Tuotteen lisäys valikoimaan</h2>
    <p>Syötä uuden tuotteen tiedot alla oleviin kenttiin.</p>
    <form action="tuotteen_lisays.php" method="post" enctype="multipart/form-data">
        <fieldset class="lomake">
            <legend>Tuotteen lisäys:</legend>
            <label for="nimi">Nimi:</label>
            <input type="text" id="nimi" name="nimi" pattern="[AZÄÖ-azäö]" minlenght=2 required><br>
            <label for="kuvaus">Kuvaus:</label>
            <textarea rows="4" cols="30" id="tekstikentta" name="kuvaus" pattern="[AZÄÖ-azäö]" minlenght=2 required></textarea><br>
            <label for="hinta">Hinta:</label><br>
            <input type="number" id="hinnanlisays" name="hinta" step="0.01" min="0" required><br>
            <label for="kategoriat">Kategoria:</label>
            <select name="kategoria" id="kategoria">        
            <?php
            $query="SELECT tuotekategoria FROM tuotekategoria ORDER BY tuotekategoria";
            $tulos=$yhteys->query($query); 
            while($row=mysqli_fetch_array($tulos)){
                echo "<option value=" . $row['tuotekategoria'] . ">". $row['tuotekategoria'] . "</option>";
            } ?>
            </select><br>
            <p id=ei_sisennysta>Etkö löytänyt haluamaasi kategoriaa? Lisää uusi kategoria <a href="uusiTuotekategoria.php">tästä.</a></p>          
            <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
            <input type="file" name="kuva" id="kuvan_lataus" required onchange="preview()"><br>
            <img id="frame" src="" width="50px" height="50px"/>
            <br> 
            <input id="submit" type="submit" value="Lähetä" name="submit">
        </fieldset>
    </form>

<?php
include("footer.html");
$yhteys->close();
?>