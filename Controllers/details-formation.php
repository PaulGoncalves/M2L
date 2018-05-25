<?php

$_GET['p'] = 'Details-Formation';

$title = 'Formation '.$_GET['titre'].' - M2L Formation';


if(isset($_POST['validAjoutPanier'])) {

    if($_SESSION['lvl'] != 3) {

        $reqLibelle = recup_libelle_formation($_SESSION['id_s'], $_POST['id_f']);
        $resultatLibelle = $reqLibelle->fetch();

        if($resultatLibelle['libelle'] == 'En attente') {

            $messageAjoutFormation = banniere_danger('Vous ne pouvez pas ajouter cette formation car elle est en attente d\'acceptation');

        }elseif($resultatLibelle['libelle'] == 'Acceptée') {

            $messageAjoutFormation = banniere_danger('Vous ne pouvez pas ajouter cette formation car elle vous a déjà été accepté');

        }elseif($resultatLibelle['libelle'] == 'Effectuée') {

            $messageAjoutFormation = banniere_danger('Vous ne pouvez pas ajouter cette formation car vous l\'avez déjà effectuée');

        } else {

            $reqForm = recup_formation_idf($_POST['id_f']);
            $resultatForm = $reqForm->fetch();
            if($resultatForm['nb_place'] >= 1) {

                if($_SESSION['credits'] >= $resultatForm['nb_jour']) {


                    $placeDispo = $_POST['nb_place'] - 1;
                    $_SESSION['credits'] = $_SESSION['credits'] - $_POST['nb_jour'];
                    update_place_formation($placeDispo, $_POST['id_f']);

                    update_credit_salarie($_SESSION['id_s'], $_SESSION['credits']);

                    insert_libelle_formation('En attente', $_POST['id_f'], $_SESSION['id_s']);


                    $messageAjoutFormation = banniere_succes('La demande de formation a bien été prise en compte, veuillez patienter le temps de son acceptation');
                } else {

                    $messageAjoutFormation = banniere_danger('Vous n\'avez pas asser de crédits disponible pour cette formation');

                }

            } else {

                $messageAjoutFormation = banniere_danger('Il n\'y a plus de place pour cette formation');

            }

        }

    } else {
        
        $messageAjoutFormation = banniere_danger('Vous ne pouvez pas ajouter de formation en tant qu\'admistrateur');
        
    }

}


if(isset($_GET['titre'], $_GET['date'])) {


    require 'Views/details-formation.php';

} else {

    header('Location: '.BASE_URL.'/Formations');

}
?>