<?php 
include_once "start.php";

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }

global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

if(isset($_POST['login'])) {
    $kayttajatunnus_signin = $_POST['nimi'];
    $salasana_signin     = $_POST['salasana'];

    // clean data 
    $kayttajatunnus=$yhteys->real_escape_string(strip_tags($_POST['nimi']));
    $ssana = $yhteys->real_escape_string($_POST['salasana']);

    // Query if email exists in db
    $sql = "SELECT * From kayttajat WHERE kayttajatunnus = '$kayttajatunnus' ";
    $query = mysqli_query($yhteys, $sql);
    $rowCount = mysqli_num_rows($query);

    // If query fails, show the reason 
    if(!$query){
       die("SQL-kysely epäonistui: " . mysqli_error($yhteys));
    }

    if(!empty($kayttajatunnus) && !empty($salasana_signin)){
        if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $ssana)) {
            $wrongPwdErr = '<div>
                    Salasanan tulisi olla 6-20 merkkiä pitkä, sisältää vähintään yksi erikoismerkki, iso sekä pieni kirjain ja numero.
                </div>';
        }
        // Check if email exist
        if($rowCount <= 0) {
            $accountNotExistErr = '<div>
                    Käyttäjätiliä ei löydy.
                </div>';
        } else {
            // Fetch user data and store in php session
            while($row = mysqli_fetch_array($query)) {
                $email     = $row['email'];
                $_salasana    = $row['salasana'];
                $token         = $row['token'];
                $is_active     = $row['is_active'];
            }

            // Verify password
            $salasana = password_verify($salasana_signin, $_salasana);

            // Allow only verified user
            if($is_active == '1') {
                if($kayttajatunnus_signin == $kayttajatunnus && $salasana_signin == $salasana) {
                   header("Location: dashboard.php");
                   $_SESSION['salasana'] = $_salasana;
                   $_SESSION['kayttajatunnus'] = $kayttajatunnus;
                   $_SESSION['email'] = $email;
                   $_SESSION['token'] = $token;

                } else {
                    $emailPwdErr = '<div>
                            Joko käyttäjätunnus tai salasana on väärin.
                        </div>';
                }
            } else {
                $verificationRequiredErr = '<div>
                        Käyttäjätunnuksen sähköpostia ei ole vahvistettu.
                    </div>';
            }

        }

    } else {
        if(empty($kayttajatunnus_signin)){
            $email_empty_err = "<div>
                        Käyttäjätunnus puuttuu.
                </div>";
        }
        
        if(empty($salasana_signin)){
            $pass_empty_err = "<div>
                        Salasana puuttuu.
                    </div>";
        }            
    }

}

?>