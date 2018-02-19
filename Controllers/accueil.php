<?php

$_GET['p'] = 'accueil';

$title = 'Accueil - M2L Formation';

update_layout_credits($_SESSION['id_s']);
MAJ_historique_Formation();

if($_SESSION['lvl'] == 1 ) {
    
    require 'Views/accueil-salarie.php';
    
} elseif($_SESSION['lvl'] == 2) {
    
    require 'Views/accueil-chef.php';
    
}elseif($_SESSION['lvl'] == 3) {
    
    require 'Views/accueil-admin.php';
}


?>