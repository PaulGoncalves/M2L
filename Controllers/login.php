<?php

$_GET['p'] = 'login';


if(isset($_POST['submitConnexion'])) {

    if(!empty($_POST['email']) AND $_POST['mdp']) {

        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1(htmlspecialchars($_POST['mdp']));

        $userReq = get_user($email, $mdp);

        if($user= $userReq->fetch()) {
            
            if(isset($_POST['remember'])){
                
                setcookie('email', $email, time()+365*24*3600, null, null, false, true);
                setcookie('password', $mdp, time()+365*24*3600, null, null, false, true);
                
            }

            $_SESSION['auth'] = true;
            $_SESSION['id_s'] = $user['id_s'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['mdp'] = $user['mdp'];
            $_SESSION['lvl'] = $user['lvl'];
            $_SESSION['credits'] = $user['credits'];

            header("Location:" . BASE_URL );


        } else {

            $messageConnexion = '<h4 style="color:red;" align="center">Votre identifiant ou mot de passe n\'est correct</h4>';

        }

    } else {

        $messageConnexion = '<h4 style="color:red;" align="center">Vous devez remplir tous les champs</h4>';

    }

}

require 'Views/login.php';
?>