<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page devis</title>
  <link rel="stylesheet" href="deviscss/cssbigdevis.css">
  <link rel="stylesheet" href="deviscss/css1200devis.css">
  <link rel="stylesheet" href="deviscss/css960devis.css">
  <link rel="stylesheet" href="deviscss/css768devis.css">
  <link rel="stylesheet" href="deviscss/cssmobiledevis.css">
  <link rel="stylesheet" href="deviscss/menucontact.css">
  

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 
  
  <script src="script.js"></script>
</head>
<body>

<?php
include "menu2.php";
?>




<div id="content">



    <div class="contentwrap">

        <div id="firstpart">

            <form action="" method="post" >
       <div id="finputs">
         <input type="text" id="name" name="fname"  placeholder="PRÉNOM *" required minlength="2" maxlength="58" size="10">
        <input type="text" id="name1" name="lname"  placeholder="NOM *" required minlength="2" maxlength="58" size="10">
         
        <input type="text" id="name" name="email"  placeholder="VOTRE ADRESSE EMAIL *" required minlength="4" maxlength="58" size="10">
        <input type="text" id="name1" name="tel"  placeholder="TELEPHONE *" required minlength="4" maxlength="58" size="10">
    </div>
        <input type="text" id="name2" name="message"  placeholder="VOTRE MESSAGE *" required minlength="4" maxlength="408" size="10">
        
        <div class="g-recaptcha" data-sitekey="6Lf1O1kgAAAAAHW5p8XQY0N36Pk4xGkYt_Xbiimy"></div>


        <input type="submit" name="submit" id="subbut" value="ENVOYER">

</form>
 
<div class="status">


<?php

if(isset($_POST['submit']))
{

$User_name = $_POST['fname']." ".$_POST['lname'];
$phone = $_POST['tel'];
$user_email = $_POST['email'];
$user_message = $_POST['message'];

$email_from ='contact@aziebat.com';
$email_subject = "Formulaire de contact Azie Bat";
$email_body="Nom: $User_name.\n".
            "No de telephone: $phone.\n".
            "Email: $user_email.\n".
            "Message: $user_message.\n";


            $to_email="azie.bat.sarl@gmail.com, kevin.simms@hotmail.fr";
            $headers = "From: $email_from \r\n";
            $headers .= "Reply-To: $user_email \r\n";


            $secretKey = "6Lf1O1kgAAAAAAaGKLtRwvEpqVTsOMuSOSQYNz55";
            $responseKey = $_POST['g-recaptcha-response'];
            $UserIP = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

            $response = file_get_contents($url);

            $response = json_decode($response);

            if($response -> success){
                mail($to_email, $email_subject, $email_body, $headers);
                echo "Message envoyé avec succès";
            }

            else {
                
                echo "Captcha invalide";
            }


}


?>

</div>


    </div>


   




         <div id ="secondpart">
         <h3 class="adressetext" id="adressid">95 avenue Denis Papin</h3>
         <h3 class="adressetext2" id="adressid2">45800 Saint Jean de Braye</h3>
        
        <div id="telephonenumber">09 54 37 82 92</div>
        
        
        
        <div id="telephonenumber"> contact@aziebat.com</div>

        <h3 class="adressetext2" id="adressid2">DU LUNDI AU VENDREDI</h3>
        <h3 class="adressetext2" id="adressid2">8H – 18H</h3>
        <h3 class="adressetext2" id="adressid2">SANS INTERRUPTION</h3>
        
<div id="wrapframe">
        <iframe class="frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2673.972085712972!2d1.9493273155064053!3d47.91757757443702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e4fca45103759b%3A0x70478c2ec28388cf!2s95%20Av.%20Denis%20Papin%2C%2045800%20Saint-Jean-de-Braye!5e0!3m2!1sfr!2sfr!4v1646837590304!5m2!1sfr!2sfr" width="330" height="230" marginTop="15px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
        </div>

        </div>
    </div>

</div>

<?php
        if(isset($_GET["send"])){
if($_GET["send"] === "check") echo "<p id='menv'>message envoyé </p>";
        }
?>


<script src="deviscss/scriptindexcontact.js"></script>

</body>

</html>