<?php
include_once "suojaamaton_sivu.php";
?>
    <h2>Ota yhteyttä</h2>
    <ul class="yleinen">
        <li>puhelimitse yksittäisiin myymälöihin</li>
        <li>sähköpostitse: asiakaspalvelu@puutarhaliikeneilikka.fi</li>
        <li>alla olevalla lomakkeella</li>
    </ul>
    <form action="lomakkeenkasittelija.php" method="post">
        <fieldset class="lomake">
            <legend>Yhteystietolomake:</legend>
            <label for="nimi">Nimi:</label>
            <input type="text" id="nimi" name="nimi" pattern="[AZÄÖa-zäåö]" minlenght=2 required><br>
            <label for="email">Sähköposti:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="aihe">Aihe:</label>
            <select name="aihe" id="aihe">
                <option value="tuotekysymys">Kysymys tuotteista</option>
                <option value="tilaus">Tilaus</option>
                <option value="yhteydenottopyynto">Yhteydenottopyyntö</option>
                <option value="muu">Muu</option>
            </select><br>
            <textarea id="tekstikentta" name="viesti" rows="5" cols="50" placeholder="Kirjoita viestisi tähän"></textarea><br>
            <input id="submit" type="submit" value="Lähetä" name="submit">
        </fieldset>
    </form>

<?php
include_once "footer.html";
?>