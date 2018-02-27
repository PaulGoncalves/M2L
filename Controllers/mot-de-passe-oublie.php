<?php

$_GET['p'] = 'Mot-de-passe-oublie';

if(isset($_POST['submitMdpOublie'])) {

    $email = htmlspecialchars($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $req = verif_mail($email);
        $resultat = $req->rowCount();

        if($resultat >= 1) {

            $mdp = generation_mdp(10);
            echo $mdp;

            $subject = "Récupération mot de passe du site M2L Formation";

            $message='<html>
                        <head></head>
                        <body>
                            <h4>Envoie du nouveau mot de passe du site M2L Formation</h4>
                            <br />
                            <p>Pour vous connecter à nouveau au site M2L Formation veuillez entrer ce nouveau mot de passe dans le champs correspondant lors de votre connexion.</p>
                            <p>Nouveau mot de passe :'.$mdp.'</p>
                            <p><b>ATTENTION, Veillez à bien changer votre mot de passe après vous être connecté.</b></p>
                        </body>
                    </html>';

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            mail($email, $subject, $message, $headers);
            
            $messageMdpOublie = '<h4 align="center" style="color:green;">Votre mot de passe à été envoyer par email</h4>';

        } else {

            $messageMdpOublie = '<h4 align="center" style="color:red;">Aucune adresse email ne correspond</h4>';

        }

    } else {

        $messageMdpOublie = '<h4 align="center" style="color:red;">Le format de l\'adresse email n\'est pas correct</h4>';

    }

}


require 'Views/mot-de-passe-oublie.php';
?>