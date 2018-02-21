<?php

$_GET['p'] = 'Details-Formation';

    $title = 'Formation '.$_GET['titre'].' - M2L Formation';


if(isset($_POST['validAjoutPanier'])) {

    $reqLibelle = recup_libelle_formation($_SESSION['id_s'], $_POST['id_f']);
    $resultatLibelle = $reqLibelle->fetch();

    if($resultatLibelle['libelle'] == 'En attente') {

        $messageAjoutFormation = '<h4 style="color:red;">Vous ne pouvez pas ajouter cette formation car elle est en attente d\'acceptation</h4>';

    }elseif($resultatLibelle['libelle'] == 'Acceptée') {

        $messageAjoutFormation = '<h4 style="color:red;">Vous ne pouvez pas ajouter cette formation car elle vous a déjà été accepté</h4>';

    }elseif($resultatLibelle['libelle'] == 'Effectuée') {

        $messageAjoutFormation = '<h4 style="color:red;">Vous ne pouvez pas ajouter cette formation car vous l\'avez déjà effectuée</h4>';

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


                $messageAjoutFormation = '<h4 style="color:green;">La demande de formation a bien été prise en compte, veuillez patienter le temps de son acceptation</h4>';
            } else {

                $messageAjoutFormation = '<h4 style="color:red;">Vous n\'avez pas asser de crédits disponible pour cette formation</h4>';

            }

        } else {

            $messageAjoutFormation = '<h4 style="color:red;">Il n\'y a plus de place pour cette formation</h4>';

        }

    }

}


if(isset($_GET['titre'], $_GET['date'])) {


    require 'Views/details-formation.php';

} else {
    
    header('Location: '.BASE_URL.'/Formations');
    
}
?>