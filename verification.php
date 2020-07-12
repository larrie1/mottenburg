<?php
if(!isset($_POST['submit'])) {
  //this page should not be accessed directly. Need to submit the form.
  echo "error; you need to submit the form!";
}
$name = $_POST['nameInput'];
$visitor_email = $_POST['emailInput'];
$message = $_POST['Nachricht'];
$URL_OK = "thankyou.html"
$URL_not_OK = "#"

//validate first
if(empty($name)) $name = "anonymous";
if(empty($visitor_email)) $visitor_email = "anonymous"
if(empty($message)) {
  echo "Schreiben Sie bitte erst eine Nachricht!";
  exit;
}

//Datum, wann die Mail erstellt wurde
$name_tag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
$num_tag = date("w");
$tag = $name_tag[$num_tag];
$jahr = date("Y");
$n = date("d");
$monat = date("m");
$time = date("H:i");

//Erste Zeile unserer Email
$msg = ":: Gesendet am $tag, den $n.$monat.$jahr - $time Uhr ::\n\n";

$email_subject = "Neue Nachricht -- [Mottenburg]";
$email_body = "Neue Nachricht von $name\n".
"email Adresse: $visitor_email\n".
"Die Nachricht lautet: \n $message".

$to = "andrepeters541@gmail.com";
$headers = "From $visitor_email \r\n";

//send the email
$mail_send = mail($to,$email_subject,$email_body,$headers);
//done. redirect to thankyou page
if($mail_send) {
  header("Location: ".$URL_OK); //Mail was send
  exit;
} else {
  header("Location: ".$URL_not_OK); //Mail was not send
  exit;
}
 ?>
