<?php

$_GET['p'] = 'Recherche';

$recherche = htmlspecialchars($_POST['recherche']);


if(isset($_POST['recherche']) AND !empty($_POST['recherche'])) {

    require 'Views/recherche.php';

} else {
    
    redirection();
}

?>