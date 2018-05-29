<?php

$_GET['p'] = "modification-utilisateur";

$title = 'Modification Utilisateur - M2L Formation';

if(isset($_POST['updateUser'])) {

    if(!empty($_POST['nom']) AND $_POST['prenom'] AND $_POST['email'] AND $_POST['credits']) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $credits = htmlspecialchars($_POST['credits']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            update_salarie($_POST['id_s'], $nom, $prenom, $email, $credits);

            $messageSalarie = banniere_succes('Les informations personnelles de '.$prenom.' '.$nom.' ont été mises à jour');
            
        } else {

            $messageSalarie = banniere_danger('Le format de l\'adresse email est incorrect');

        }

    } else {

        $messageSalarie = banniere_danger('Tous les champs doivent être remplis');

    }

}

if(isset($_POST['supprUser'])) {
    
    delete_user($_GET['id_s']);
    header('Location:' .BASE_URL.'/gestion-salarie');
    
}

if(isset($_GET['id_s'])) {

    $reqS = recup_salarie($_GET['id_s']);
    $resultatS = $reqS->fetch();

    require 'Views/modification-utilisateur.php';

} else {

    header('Location:' .BASE_URL.'/gestion-salarie');

}

?>