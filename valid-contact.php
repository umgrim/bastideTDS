<?php
define("HOTE_SMTP_1","localhost");
define("USER_SMTP_1","contact@chambre-avec-jacuzzi-spa.fr");
define("PASSE_SMTP_1","070383");
define("SMTPAuth_SMTP_1",true);
// Nettoyage des entrÃ©es
  while(list($var,$val)=each($_POST)){
  if(!is_array($val)){
    $$var=strip_tags($val);
  }else{
    while(list($arvar,$arval)=each($val)){
        $$var[$arvar]=strip_tags($arval);
      }
    }
  }
include("class/class.mailer.php");

$mail = new PHPmailer();
$mail->IsSMTP(true);
$mail->IsHTML(true);
$mail->Host=HOTE_SMTP_1;
$mail->Username=USER_SMTP_1;
$mail->Password=PASSE_SMTP_1;
$mail->From='contact@chambre-avec-jacuzzi-spa.fr';
$mail->SMTPAuth=SMTPAuth_SMTP_1;
$mail->AddAddress("contact@chambre-avec-jacuzzi-spa.fr");
$mail->Subject="Demande de renseignement -- WebApp";
$mail->CharSet='utf-8'; // PrÃ©cision sur l'encodage pour phpmailer
$mail->Body='<html><body><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style>.entete{background-color:#65523d;color:#DBD1C5;border:solid 3px;font-size:20px}';
$mail->Body.='.ligne{color:#65523d;border:solid 1px;text-align:center;font-size:23px}</style></head>';
$mail->Body.='<center><table><tr><td class="ligne">Nom : </td><td class="entete">'.$Question8.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Prenom : </td><td class="entete">'.$Question9.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Adresse : </td><td class="entete">'.$Question10.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Code postal : </td><td class="entete">'.$Question11.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Ville : </td><td class="entete">'.$Question12.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Tel : </td><td class="entete">'.$Question13.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Fax : </td><td class="entete">'.$Question14.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Date : </td><td class="entete">'.$Question15.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Chambre : </td><td class="entete">'.$Question16.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Renseignement : </td><td class="entete">'.$Question17.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Nombre adulte : </td><td class="entete">'.$Question18.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Nombre de nuitee : </td><td class="entete">'.$Question19.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Mail : </td><td class="entete">'.$Question20.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Comment nous avez vous connu : </td><td class="entete">'.$Question21.'</td></tr>';
$mail->Body.='<tr><td class="ligne">Êtes vous déjà venu ? : </td><td class="entete">'.$Question22.'</td></tr>';
$mail->Body.='<tr><td width="300px" class="ligne">Envoyé par </td><td width="500px" class="entete">' .$_SERVER['HTTP_USER_AGENT'].'</td></tr>';
$mail->Body.='</table></center></body></html>';
$mail->AltBody=strip_tags(nl2br($mail->Body));

if(!$mail->Send())
{ //Teste si le return code est ok.
  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
}

$mail->SmtpClose();
unset($mail);   
?>