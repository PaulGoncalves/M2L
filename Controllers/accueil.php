<?php
$_GET['p'] = 'accueil';

$formation = get_last_formion{0,5};

foreach($formation as $k => $v) {
    $formations[$k]['contenu'] = str_sub
}

require 'Views/accueil.php';
?>