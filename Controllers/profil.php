<?php

$_GEt['p'] = 'Profil';

if(isset($_POST['validNewMdp']))  {

    if(!empty($_POST['ancienMdp']) AND $_POST['Mdp'] AND $_POST['confirmMdp']) {

        if($_POST['Mdp'] == $_POST['confirmMdp']) {

            $ancienMdp = sha1(htmlspecialchars($_POST['ancienMdp']));
            $newMdp = sha1(htmlspecialchars($_POST['Mdp']));

            $req = get_user($_SESSION['email'], $ancienMdp);
            $resultat = $req->fetch();

            if($ancienMdp == $resultat['mdp']) { //Verifie que les deux nouveaux mdp correspondent
                
                if($ancienMdp != $newMdp) { //Verifie que le new mdp est different de l'ancien
                    
                    update_mdp_salarie($_SESSION['email'], $newMdp);
                    
                    $messageProfil = banniere_succes('Votre mot de passe à été changé avec succès.');
                    
                } else {
                    
                    $messageProfil = banniere_danger('Le mot de passe doit être différent de l\'ancien.');
                    
                }
                
            } else {

                $messageProfil = banniere_danger('L\'ancien mot de passe ne correspond pas.');
            }
        }
    } else {

        $messageProfil =  banniere_danger('Tous les champs du formulaire de changement de mot de passe doivent être remplis.');
                        

    }

}


require 'Views/profil.php';
?>