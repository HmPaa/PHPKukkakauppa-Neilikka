<?php 
include_once("start.php");
include_once("maileri.php");
include_once("suojaamaton_sivu.php");

if(isset($_POST['submit_email']) && $_POST['email']){
    $email=$yhteys->real_escape_string(strip_tags($_POST['email']));
    $query="SELECT * FROM kayttajat WHERE email='$email'";
    $tulos=mysqli_query($yhteys, $query);
    if(mysqli_num_rows($tulos)==1){
        while($row=mysqli_fetch_array($tulos)){
            $_email=md5($row['email']);
            $kayttajatunnus=$row['kayttajatunnus'];
            $ssana=md5($row['salasana']);
            $hkayttaja=md5($row['kayttajatunnus']);
        }
        $subject="Neilikan intranetin salasanan vaihtaminen";
        $msg="<a href='http://localhost/moodle/PHPKukkakauppa%20Neilikka/vaihda_salasana.php?key=" . $_email . "&reset=" . $ssana . "&user=" . $hkayttaja . "'>Klikkaa tästä  vaihtaaksesi salasanan käyttäjätunnukselle " . $kayttajatunnus . ".";
        $emailTo=$email;
        posti($emailTo, $msg, $subject);
    }
}
include_once("footer.html");
?>