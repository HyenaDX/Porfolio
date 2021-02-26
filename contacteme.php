<?php

ini_set("SMTP", "ssl://smtp.gmail.com");
ini_set("smtp_port", 587);

$header='MIME-version: 1.0\r\n';
$header.= 'Content-Type:text/html; charset="utf-8"'."\n";
$header.= 'Content-Transfert-Encoding: 8bit';

if(isset($_POST['object']) && isset($_POST['email']) && isset($_POST['message'])){

    $destinataire = "michel.onlineformapro@gmail.com";
    $object = $_POST['object'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = $destinataire;
    $subject = $object;
    $headers = $email;
    $message = '
            <html>
            <body>
                <div align="center">
                    <u>Nom de l\'expediteur :</u>' .$subject.'<br />
                    <u>Email de l\'expediteur :</u>' .$email.'<br />
                    <br />
                    '.$message.'
                    <br />
                </div>
            </body>
            </html>
        ';
    //Appel de la fonction mail PHP

    mail($to, $subject,$message,$headers);
    var_dump(mail($to, $subject,$message,$headers));
    $msg =  "<p class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative'>Votre message a bien été envoyé ! Une réponse vous sera rapidement envoyé.</p>";
}else{
    $msg =  "<p class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative'>Erreur lors de l'envois de email</p>";
}

if (isset($msg)) {
    echo $msg;
}

?>