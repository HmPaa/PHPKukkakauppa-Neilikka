<?php
   
    // Database connection
    include('start.php');
    include("maileri.php"); 
    
    // Error & success messages
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_kayttajatunnus = $_email = $_salasana = "";

    if(isset($_POST["UKsubmit"])) {
        $kayttajatunnus = $_POST["kayttajatunnus"];
        $email         = $_POST["email"];
        $salasana      = $_POST["salasana"];
 
        // check if email already exist
        $email_check_query = mysqli_query($yhteys, "SELECT * FROM kayttajat WHERE email = '$email' ");
        $rowCount = mysqli_num_rows($email_check_query);


        // PHP validation
        // Verify if form values are not empty
        if(!empty($kayttajatunnus) && !empty($email) && !empty($salasana)){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = 'Tällä sähköpostiosoitteella on jo luotu käyttäjätunnus.';
            } else {
                
                // clean the form data before sending to database
                $_kayttajatunnus = mysqli_real_escape_string($yhteys, $kayttajatunnus);
                $_email = mysqli_real_escape_string($yhteys, $email);
                $_salasana = mysqli_real_escape_string($yhteys, $salasana);

                // perform validation
                if(!preg_match("/[^\s]/", $_kayttajatunnus)) {
                    $f_NameErr = 'Käyttäjätunnus ei voi sisältää välilyöntejä. ';
                }
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = 'Sähköposti ei ole oikeassa muodossa. ';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_salasana)) {
                    $_passwordErr = 'Salasanan tulisi olla 6-20 merkkiä pitkä ja sisältää vähintään yksi erikoismerkki, iso kirjain, pieni kirjain ja numero. ';
                }
                
                // Store the data in db, if all the preg_match condition met
                if((preg_match("/[^\s]/", $_kayttajatunnus)) && (filter_var($_email, FILTER_VALIDATE_EMAIL)) && 
                (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_salasana))){

                    // Generate random activation token
                    $token = md5(rand().time());
                    
                    // Password hash
                    $salasana_hash = password_hash($_salasana, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO kayttajat (kayttajatunnus, salasana, email, token, is_active)
                     VALUES ('$_kayttajatunnus', '$salasana_hash', '$_email', '$token', '0')";
                    
                    // Create mysql query
                    $query = mysqli_query($yhteys, $sql);
                    
                    if(!$query){
                        die("Tietokantakysely epäonnistui. " . mysqli_error($yhteys));
                    } 

                    // Send verification email
                    if($query) {
                        $msg = 'Vahvista sähköpostiosoitteesi allaolevasta linkistä. <br><br>
                          <a href="http://localhost:8888/php-user-authentication/user_verificaiton.php?token='.$token.'"> Klikkaa tästä vahvistaaksesi sähköpostiosoitteesi. </a>
                        ';
                        $emailTo=$email;
                        $subject='Kukkatalo Neilikan intranetin uusi käyttäjätunnus';
                        posti($emailTo, $msg, $subject);
                    }
                }
            }
        } else {
            if(empty($kayttajatunnus)){
                $fNameEmptyErr = 'Käyttäjätunnus ei voi olla tyhjä. ';
            }
            if(empty($email)){
                $emailEmptyErr = 'Sähköpostikenttä ei voi olla tyhjä. ';
            }
            if(empty($password)){
                $passwordEmptyErr = 'Salasanakenttä ei voi olla tyhjä.';
            }            
        }
    }
    $yhteys->close();
?>