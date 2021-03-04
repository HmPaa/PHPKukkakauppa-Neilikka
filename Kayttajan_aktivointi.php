<?php
    // Database connection
    include('start.php');

    global $email_verified, $email_already_verified, $activation_error;

    // GET the token = ?token
    if(!empty($_GET['token'])){
       $token = $_GET['token'];
    } else {
        $token = "";
    }

    if($token != "") {
        $sqlQuery = mysqli_query($yhteys, "SELECT * FROM kayttajat WHERE token = '$token' ");
        $countRow = mysqli_num_rows($sqlQuery);

        if($countRow == 1){
            while($rowData = mysqli_fetch_array($sqlQuery)){
                $is_active = $rowData['is_active'];
                  if($is_active == 0) {
                     $update = mysqli_query($yhteys, "UPDATE kayttajat SET is_active = '1' WHERE token = '$token' ");
                       if($update){
                           $email_verified ='<div>
                                  Käyttäjätili on aktivoitu. Voit sulkea tämän ikkunan.
                                </div>
                           ';
                       }
                  } else {
                        $email_already_verified = '<div>
                               Sähköposti on jo vahvistettu!
                            </div>
                        ';
                  }
            }
        } else {
            $activation_error = '<div>
                    Aktivointi ei onnistunut!
                </div>
            ';
        }
    }
?>