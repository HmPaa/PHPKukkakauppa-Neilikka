<?php 
include_once "kulunvalvonta.php";
include_once "header.php";
include_once "start.php";
?>
<h2>Uuden tuotekategorian lisäys</h2>    
<fieldset class="lomake">    
<form action="tuotteen_lisays.php" method="post">
<label for="uusiTuotekategoria">Uusi tuotekategoria:</label>
<input type="text" id="uusiTuotekategoria" name="uusiTuotekategoria" pattern="[^A.*/]" 
autofocus required title="Aloitathan isolla kirjaimella." minlenght=2 required>
<input id="submit" type="submit" value="Lähetä" name="TKsubmit">
</form>
</fieldset>
<?php
include_once "footer.html";
?>