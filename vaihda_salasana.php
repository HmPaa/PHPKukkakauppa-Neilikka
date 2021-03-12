<?php
include_once("suojaamaton_sivu.php");
include_once("start.php");
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $hkayttaja=$_GET['user'];
  $query="SELECT * FROM kayttajat WHERE md5(email)='$email' AND md5(salasana)='$pass' AND md5(kayttajatunnus)='$hkayttaja'";
  $tulos=$yhteys->query($query);
  if(mysqli_num_rows($tulos)==1)
  {
     while($row=mysqli_fetch_array($tulos)){
         $kayttajatunnus=$row['kayttajatunnus'];
     } 
    ?>
    <fieldset class="lomake">
    <form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <label for='password'>Kirjoita uusi salasana käyttäjätilille <?php echo $kayttajatunnus?>:</label>
    <input type="password" name='password' pattern="^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$" required
    autofocus title="Salasanan tulisi olla 6-20 merkkiä pitkä ja sisältää vähintään yksi erikoismerkki, iso kirjain, pieni kirjain ja numero.">
    <input type="submit" name="submit_password">
    </form>
    </fieldset>
    <?php
  }
}
include_once("footer.html");
?>