<?php
include 'Models/connectBdd.php';
include 'Controllers/functionControllers.php';
include 'Models/functionModels.php';

session_start();
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));

if(isset($_COOKIE['email'], $_COOKIE['password'])) {

    if(!isset($_SESSION['auth'])) {

        login_cookies($_COOKIE['email'], $_COOKIE['password']);

    }

}

if(isset($_GET['p']) AND !isset($_SESSION['id_s']) AND $_GET['p'] == "Mot-de-passe-oublie") {
    
    $_GET['p'] = 'Mot-de-passe-oublie';
    include 'controllers/'.$_GET['p'].'.php';
    
} elseif(!isset($_SESSION['id_s'])) {

    $_GET['p'] = 'login';
    include 'controllers/'.$_GET['p'].'.php';

} else {

    if(!isset($_GET['p']) || $_GET['p'] == "") 
    {    
        $_GET['p'] = "accueil";
    }

    else 

    {
        if(!file_exists("Controllers/".$_GET['p'].".php")) {
            $_GET['p'] = '404';
        }
    }


    ob_start();
    require "Controllers/".$_GET['p'].".php";
    $content = ob_get_contents();
    ob_end_clean();

    require "Views/layout.php";

}

?>