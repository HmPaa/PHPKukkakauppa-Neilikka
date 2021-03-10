<?php include_once("suojaamaton_sivu.php");
include_once "kirjautuja.php";
?>
    <h2>Intranet</h2>
    <p>Ongelmatilanteissa ota yhteyttä support@neilikka.fi.</p>

    <form action="" method="POST">
        <fieldset class="lomake">
            <legend>Kirjautuminen työntekijöille</legend>
            <?php echo $accountNotExistErr; ?>
            <?php echo $emailPwdErr; ?>
            <?php echo $verificationRequiredErr; ?>
            <?php echo $email_empty_err; ?>
            <?php echo $pass_empty_err; ?>
            <?php if(isset($ei_sisaankirjausta)){echo $ei_sisaankirjausta; }?>
            <label for="kayttajatunnus">Käyttäjätunnus:</label>
            <input type="text" id="nimi" name="nimi" pattern="[AZÄÖ-azäö]" minlenght=2 required>
            <label for="salasana">Salasana:</label>
            <input type="password" id="salasana" name="salasana" required><br>
            <span class="checkbox"> 
                <label for="muista_minut"><span>Muista minut</span><input type="checkbox" name="muista_minut"></label>
            </span>
            <input id="submit" type="submit" value="Kirjaudu sisään" name="login">
        </fieldset>
    </form>
    <p>Uusi käyttäjä? Luo tunnukset <a href="uusi_kayttaja.php">tästä.</a></p>

<?php
include_once "footer.html";
?>