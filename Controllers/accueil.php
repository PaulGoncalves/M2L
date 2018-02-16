<?php

$_GET['p'] = 'accueil';

$title = 'Accueil - M2L Formation';

if($_SESSION['lvl'] == 1 ) {
    
    require 'Views/accueil-salarie.php';
    
} elseif($_SESSION['lvl'] == 2) {
    
    require 'Views/accueil.php';
    
}elseif($_SESSION['lvl'] == 3) {
    
}


?>