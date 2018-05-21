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

        if(preg_match("#^[a-zA-ZçéèêëùàîïöôËÄÖÜÊÂÔÛ ]{3,35}+$#", $nom)) {

            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

                if(preg_match("#^0[1-689]([-. ]?[0-9]{2}){4}$#", $tel)) {

                    if(preg_match("#^[0-9]+$#", $numero)) {

                        if(preg_match("#^[0-9abAB]{1,5}+$#", $code_postal)) {

                            if(preg_match("#^[a-zA-ZçéèêëùàîïöôËÄÖÜÊÂÔÛ ]{3,35}+$#", $rue)) {

                                if(preg_match("#^[a-zA-ZçéèêëùàîïöôËÄÖÜÊÂÔÛ ]{3,20}+$#", $ville)) {

                                    insert_PrestataireAdresse($rue, $numero, $ville, $code_postal, $nom, $tel, $mail);

                                    $messageFormation = banniere_succes('Le prestataire a bien été ajouté');

                                } else {
                                    
                                    $messageFormation = banniere_danger('Le champ ville n\'a pas été remplis correctement');
                                    
                                }

                            } else {

                                $messageFormation = banniere_danger('Le champ voie n\'a pas été remplis correctement');
                                
                            }

                        } else {

                            $messageFormation = banniere_danger('Le champ code postal n\'a pas été remplis correctement');

                        }

                    } else {

                        $messageFormation = banniere_danger('Le champ numéro n\'a pas été remplis correctement');

                    }

                } else {

                    $messageFormation = banniere_danger('Le champ téléphone n\'a pas été remplis correctement');

                }

            } else {

                $messageFormation = banniere_danger('Le champ email n\'a pas été remplis correctement');

            }

        } else {

            $messageFormation = banniere_danger('Le champ nom n\'a pas été remplis correctement');

        }

    } else {
        
        $messageFormation = banniere_danger('Tous les champs doivent être remplis');
        
    }

}




if($_SESSION['lvl'] == 3) {

    require 'Views/Ajout-Prestataire.php';

} else {

    redirection();
}

?>