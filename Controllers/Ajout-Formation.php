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

            if(preg_match("#^[a-zA-ZçéèêëùàîïöôËÄÖÜÊÂÔÛ ]{3,35}+$#", $titre)) {

                if(preg_match("#^[0-9]+$#", $nb_jour)) {

                    if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" , $dateDeb)) {

                        if(preg_match("#^[0-9]+$#", $nb_place)) {

                            if(preg_match("#^[0-9]+$#", $prestataire)) {

                                if (preg_match("#^[a-zA-ZçéèêëùàîïöôËÄÖÜÊÂÔÛ!:;,§/.?\(\)@ ]{3,300}+$#", $contenu)) {

                                    insert_formation($titre, $nb_jour, $dateDeb, $nb_place, $prestataire, $contenu);

                                    $messageFormation = banniere_succes('La formation a bien été ajouté');

                                } else {

                                    $messageFormation = banniere_danger('Le champ description de la formation n\'a pas été remplis correctement');

                                }

                            } else {

                                $messageFormation = banniere_danger('Le champ prestataire n\'a pas été remplis correctement');

                            }

                        } else {

                            $messageFormation = banniere_danger('Le champ nombre de place n\'a pas été remplis correctement');

                        }

                    } else {

                        $messageFormation = banniere_danger('Le champ date de début n\'a pas été remplis correctement');

                    }

                } else {

                    $messageFormation = banniere_danger('Le champ coût(En nbs de jours) n\'a pas été remplis correctement ( <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Seuls les chiffres sont acceptés)');

                }

            } else {

                $messageFormation = banniere_danger('Le champ titre n\'a pas été remplis correctement');

            }


        } else {

            $messageFormation = banniere_danger('Vous devez remplir tous les champs');

        }

}

if(isset($_POST['supprFormation'])) {

    delete_formation($_POST['id_f']);

    $messageFormation = banniere_succes('La formation a bien été supprimé');

}

if($_SESSION['lvl'] == 3) {

    require 'Views/Ajout-Formation.php';

} else {  

    redirection();

}


?>