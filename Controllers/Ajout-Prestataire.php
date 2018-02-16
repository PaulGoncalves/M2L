<?php

$_GET['p'] = 'Ajout-Prestataire';

if(isset($_POST['validPrestataire1'])) {
    
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $tel = htmlspecialchars($_POST['tel']);
    $adresse = htmlspecialchars($_POST['adresse']);
    
    if(!empty($nom) AND $mail AND $tel AND $adresse) {
        
        insert_prestataire($adresse, $nom, $tel, $mail);
        
    } else {
        
        $messagePrestataire = 'Tous les champs doivent être remplis';
        
    }
    
}

if(isset($_POST['validPrestataire2'])) {
    
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $tel = htmlspecialchars($_POST['tel']);
    $numero = htmlspecialchars($_POST['numero']);
    $code_postal = htmlspecialchars($_POST['code_postal']);
    $rue = htmlspecialchars($_POST['rue']);
    $ville = htmlspecialchars($_POST['ville']);
    
    if(!empty($nom) AND $mail AND $tel AND $numero AND $code_postal AND $rue AND $ville) {
        
        insert_PrestataireAdresse($rue, $numero, $ville, $code_postal, $nom, $tel, $mail);
        
    } else {
        
        $messagePrestataire = 'Tous les champs doivent être remplis';
    }
    
}




if($_SESSION['lvl'] == 3) {

require 'Views/Ajout-Prestataire.php';
    
} else {
    
    redirection();
}

?>