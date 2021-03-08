<?php 
include "header.php";
include_once "kulunvalvonta.php";
    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }
?>
                    <h2>Käyttäjätiedot</h2>
                    <h3><?php echo $_SESSION['kayttajatunnus']; ?></h3>
                    <p>Sähkoposti: <?php echo $_SESSION['email']; ?></p>
                    <ul class="sivutus">
                    <li><a href="tuotteen_lisays.php">Lisää uusia tuotteita</a><br>
                    <li><a href="uusiTuotekategoria.php">Lisää uusi tuotekategoria</a><br></li>
                    
                    <li><a href="logout.php">Log out</a></li>
                    </ul>
<?php include "footer.html" ?>