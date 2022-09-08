<?php

//mail($email_to='kevin.simms@hotmail.fr', $email_subject='test', $email_message='test message');




$sujet = htmlspecialchars ( $_GET["lname"] );

$name =  htmlspecialchars ( $_GET["fname"] );
$name2 =  htmlspecialchars ( $_GET["lname"] );
$email = htmlspecialchars ( $_GET["email"] );
$tel = htmlspecialchars ( $_GET["tel"] );

$message = htmlspecialchars ( $_GET["message"] );

$bodyEmail = "<p>NOM: $name $name2</p> <p>Email: $email</p>  <p>Telephone: $tel</p> <p>Message $message</p>";

$from = "contact@aziebat.com";
$headers ="From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";

//var_dump($_GET);

$secretKey="6LdYylQfAAAAAIRZxUDujCNQrAfRhIAfLvcT_HPz";
$responseKey=$_GET['g-recaptcha-response'];
$UserIP=$_SERVER['REMOT_ADDR'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

//$response = file_get_contents($url);
//$response= json_decode($response);


if(!empty($_GET['g-recaptcha-response'])){

if(mail('kevin.simms@hotmail.fr', 'zeeshan.mian@gmail.com', $sujet, $bodyEmail,$headers)) {
        echo "success";
        header('Location: http://www.aziebat.com/new/pagedevis.php?send=check');
        exit();
} else {
	echo "email_send_failed";
        exit();
}

}

else{
        header('Location: http://www.aziebat.com/new/pagedevis.php?notsend=check');
}

/*
using System.Net;
using System.Net.Mail;

MailMessage msg = new MailMessage();
        msg.From = new MailAddress(TxtEmail.Text);
        msg.To.Add("contact@hostandservers.com");
        msg.Subject = TxtSub.Text;
        msg.Body = TxtMsg.Text;
        msg.IsBodyHtml = true;
        // MailMessage instance to a specified SMTP server
        SmtpClient smtp = new SmtpClient("relay-hosting.secureserver.net", 25);
        smtp.Credentials = new System.Net.NetworkCredential("yourgodaddyemailusername, "godaddyemailpassword");
        smtp.EnableSsl = false;
     
        // Sending the email
        smtp.Send(msg);
        // destroy the message after sent
        msg.Dispose();
        LitMsg.Text = "Thanks for email us.. will get back ASAP..!";
        TxtEmail.Text = "";
        TxtMsg.Text = "";
        TxtSub.Text = "";
        TxtName.Text = "";
*/




?>