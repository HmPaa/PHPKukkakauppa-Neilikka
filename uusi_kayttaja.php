<?php include_once "header.php"; 
?>

    <h2>Intranet</h2>

    <?php include("kayttajan_lisaaja.php");?>

    <p>Ongelmatilanteissa ota yhteyttä support@neilikka.fi.<br>
    <?php echo $success_msg; ?>
    <?php echo $email_exist; ?>

    <?php echo $email_verify_err; ?>
    <?php echo $email_verify_success; ?></p>

    <form action="uusi_kayttaja.php" method="post">
        <fieldset class="lomake">
            <legend>Uusi käyttäjä</legend>
            <label for="kayttajatunnus">Käyttäjätunnus:</label>
            <input type="text" id="kayttajatunnus" name="kayttajatunnus" minlenght=2 required>
            <p><?php echo $fNameEmptyErr; ?>
            <?php echo $f_NameErr; ?></p>
            <label for="email">Sähköposti:</label>
            <input type="email" id="email" name="email" minlenght=2 required>
            <p><?php echo $_emailErr; ?>
            <?php echo $emailEmptyErr; ?></p>
            <label for="salasana">Salasana:</label>
            <input type="password" id="salasana" name="salasana" pattern="^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$" required>
            <p><?php echo $_passwordErr; ?>
            <?php echo $passwordEmptyErr; ?></p>
            <input id="submit" type="submit" value="Lähetä" name="UKsubmit">
        </fieldset>
    </form>

<?php
include_once "footer.html";
?>