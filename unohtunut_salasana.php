<?php include_once("suojaamaton_sivu.php"); ?>
<form method="post" action="send_link.php">
  <fieldset class="lomake">
      <label for:="email">Syötä sähköpostiosoitteesi vaihtaaksesi salasanasi</label>
      <input type="text" name="email">
      <input type="submit" name="submit_email">
    </fieldset>
  </form>
    
<?php include_once("footer.html"); ?>
