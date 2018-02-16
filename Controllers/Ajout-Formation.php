<?php

$_GET['p'] = 'Ajout-Formation';


if(isset($_POST['validFormation'])) {
    
    $titre = htmlspecialchars($_POST['titre']);
    $nb_jour = htmlspecialchars($_POST['nb_jour']);
    $dateDeb = htmlspecialchars($_POST['dateDeb']);
    $nb_place = htmlspecialchars($_POST['nb_place']);
    $prestataire = htmlspecialchars($_POST['prestataire']);
    $contenu = htmlspecialchars($_POST['contenu']);
    
    if(!empty($titre) AND $nb_jour AND $dateDeb AND $nb_place AND $prestataire AND $contenu) {
        
        insert_formation($titre, $nb_jour, $dateDeb, $nb_place, $prestataire, $contenu);
        
        $messageFormation = 'La formation a bien été ajouté';
        
    } else {
        
        $messageFormation = 'Vous devez remplir tous les champs';
        
    }
    
}

if(isset($_POST['supprFormation'])) {
    
    delete_formation($_POST['id_f']);
    
    $messageFormation = 'La formation a bien été supprimé';
    
}


    if($_SESSION['lvl'] == 3) {

        require 'Views/Ajout-Formation.php';

    } else {  

        redirection();

    }


?>