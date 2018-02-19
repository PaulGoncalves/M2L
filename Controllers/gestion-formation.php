<?php

$_GET['p'] = 'Gestion-Formation';

$title = 'Gestion formation - M2L Formation';

if(isset($_POST['confirmFormation'])) {
    
    updateLibelle($_POST['id_t'], 'Acceptée');
    
}

if(isset($_POST['refuseFormation'])) {
    
    updateLibelle($_POST['id_t'], 'Refusée');
    
    $req = recup_formation_idf($_POST['id_f']);
    $resultat = $req->fetch();
    
    $placeDispo = $resultat['nb_place'] + 1; //Rajoute une place car celle-ci est refusée
    
    update_place_formation($placeDispo, $_POST['id_f']);
    
}

require 'Views/gestion-formation.php';

?>