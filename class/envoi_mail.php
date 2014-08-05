<?php
define("HOTE_SMTP_1","localhost");
define("USER_SMTP_1","contatc@secrets-provence.fr");
define("PASSE_SMTP_1","070383");
define("SMTPAuth_SMTP_1",true);

include("class.mailer.php");

$mail = new PHPmailer();
$mail->IsSMTP();
$mail->IsHTML(true);
$mail->Host=HOTE_SMTP_1;
$mail->Username=USER_SMTP_1;
$mail->Password=PASSE_SMTP_1;
$mail->From='no-reply@domain.com';
$mail->SMTPAuth=SMTPAuth_SMTP_1;
$mail->AddAddress("contact@secrets-provence.fr");
$mail->Subject="Demande de renseignement";
$mail->Body= $corps ;
$mail->AltBody=strip_tags(nl2br($mail->Body));
	
if(!$mail->Send())
{ //Teste si le return code est ok.
	echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
}

$mail->SmtpClose();
unset($mail);   



?>