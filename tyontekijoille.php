<?php
include("header.php");
?>
    <h2>Intranet</h2>
    <p>Ongelmatilanteissa ota yhteyttä support@neilikka.fi.</p>

    <form action="tuotteen_lisays.php" method="post">
        <fieldset class="lomake">
            <legend>Kirjautuminen työntekijöille</legend>
            <label for="kayttajatunnus">Käyttäjätunnus:</label>
            <input type="text" id="nimi" name="nimi" pattern="[AZÄÖ-zäåö]" minlenght=2 required>
            <label for="salasana">Salasana:</label>
            <input type="password" id="salasana" name="salasana" required><br>
            <input id="submit" type="submit" value="Lähetä" name="kirjautuminen">
        </fieldset>
    </form>
    <p>Uusi käyttäjä? Luo tunnukset <a href="uusi_kayttaja.php">tästä.</a></p>

<?php
include("footer.html");
?>