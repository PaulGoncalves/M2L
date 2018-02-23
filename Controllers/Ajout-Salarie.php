<?php

$_GET['p'] = 'Ajout-Salarie';

if(isset($_POST['validSalarie'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1(htmlspecialchars($_POST['mdp']));
    $mdp2 = sha1(htmlspecialchars($_POST['mdp2']));
    $credits = htmlspecialchars($_POST['credits']);
    $lvl = htmlspecialchars($_POST['lvl']);

    if(!empty($nom) AND $prenom AND $email AND $mdp AND $mdp2 AND $credits AND $lvl) {

        if($mdp == $mdp2) {

            if($lvl == 1) {

                $chef = htmlspecialchars($_POST['chef']);

                if(!empty($chef)) {

                    insert_salarie($nom, $prenom, $email, $mdp, $lvl, $credits, $chef);

                    $messageSalarie = 'Le salarié a bien été ajouté';

                } else {

                    $messageSalarie = 'Vous devez choisir un chef s\'il s\'agit d\'un salarié';

                }

            }

            if($lvl == 2) {

                $id_chef = NULL;

                insert_chef($nom, $prenom, $email, $mdp, $lvl, $credits, $id_chef);

                $messageSalarie = 'Le chef à bien été ajouté';

            } elseif($lvl == 3) {

                $id_chef = NULL;

                insert_salarie($nom, $prenom, $email, $mdp, $lvl, $credits, $id_chef);

                $messageSalarie = 'L\'administrateur à bien été ajouté';
            }


        } else {

            $messageSalarie = 'Les deux mot de passe ne correspondent pas';

        }

    } else {

        $messageSalarie = 'Vous devez remplir tous les champs';
    }

};

require 'Views/Ajout-Salarie.php';

?>