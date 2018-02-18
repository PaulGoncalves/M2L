<?php

$_GET['p'] = 'Gestion-Formation';

if(isset($_POST['confirmFormation'])) {
    
    updateLibelle($_POST['id_t'], 'Acceptée');
    
}

if(isset($_POST['refuseFormation'])) {
    
    updateLibelle($_POST['id_t'], 'Refusée');
    
}

require 'Views/gestion-formation.php';

?>