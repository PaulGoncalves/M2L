<?php

function disconect() {

    session_start();
    session_destroy();
    header('Location:' .BASE_URL);
}

function redirection() {

    header('Location:' .BASE_URL);

}

function menu_lvl($lvl, $page) {

    $contenu = '';

    if($lvl == 1) {

        if($page == 'accueil') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>';
        if($page == 'Formations') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'/Formations"><em class="fa fa-calendar">&nbsp;</em> Formations</a></li>';
        $contenu .= '<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                            </a></li>
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                            </a></li>
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                            </a></li>
                    </ul>
                </li>';

    } elseif($lvl == 2) {

        if($page == 'accueil') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>';
        if($page == 'Formations') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'/Formations"><em class="fa fa-calendar">&nbsp;</em> Formations</a></li>';
        if($page == 'Gestion-Formation') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'/Gestion-Formation"><em class="fa fa-user">&nbsp;</em> Gestion Formation salarié</a></li>';
        $contenu .= '<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                            </a></li>
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                            </a></li>
                        <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                            </a></li>
                    </ul>
                </li>';

    } elseif($lvl == 3) {

        if($page == 'accueil') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>';
        if($page == 'Ajout-Formation') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'/Ajout-Formation"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Ajout de formations</a></li>';
        if($page == 'Ajout-Prestataire') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .=  '<a href="'.BASE_URL.'/Ajout-Prestataire"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Ajout de prestataires</a></li>';
        if($page == 'Ajout-Salarie') { $contenu .= '<li class="active">'; } else { $contenu .= '<li>'; } $contenu .= '<a href="'.BASE_URL.'/Ajout-salarie"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ajout de salarié</a></li>';

    }

    return $contenu;

}

function affich_prestataire() {

    $req = recup_prestataire();

    $contenu = '';

    while($resultat = $req->fetch())  {

        $contenu .= '<tr id="'.$resultat['id_p'].'">
                        <td>'.$resultat['nom'].'</td>
                        <td>'.$resultat['tel'].'</td>
                        <td>'.$resultat['mail'].'</td>';

        $reqAdresse = recup_adresse_ida($resultat['id_a']); 

        while($resultatAdresse = $reqAdresse->fetch()) {

            $contenu .= '<td>'.$resultatAdresse['numero'].' '.$resultatAdresse['rue'].', '.$resultatAdresse['code_postal'].' '.$resultatAdresse['ville'].'</td>';

        }
        $contenu .= '</tr>';

    }

    $contenu .= '';

    return $contenu;
}

function affich_adresse() {

    $reqAdresse = recup_adresse();

    $contenu = '<select class="form-control" name="adresse">';

    while($resultat = $reqAdresse->fetch()) {

        $contenu .= '<option value="'.$resultat['id_a'].'">'.$resultat['numero'].' '.$resultat['rue'].', '.$resultat['code_postal'].' '.$resultat['ville'].'</option>';

    }

    $contenu .= '</select>';

    return $contenu;
}

function affiche_prestataireFormation() {
    global $bdd;    

    $req = recup_prestataire();

    $contenu = '<select class="form-control" name="prestataire">';

    while($resultat = $req->fetch()) {

        $reqAdresse = recup_adresse_ida($resultat['id_a']);

        while($resultatAdresse = $reqAdresse->fetch()) {

            $contenu .= '<option value="'.$resultat['id_p'].'">'.$resultat['nom'].', '.$resultatAdresse['numero'].' '.$resultatAdresse['rue'].' '.$resultatAdresse['ville'].', '.$resultatAdresse['code_postal'].'</option>';

        }

    }
    $contenu .= '</select>';

    return $contenu;
}

function affich_formation_admin() {

    $req = recup_formation();

    $contenu = '';

    while($resultatForm = $req->fetch()) {

        $reqPrest = recup_prestataire_idp($resultatForm['id_p']);

        while($resultatPrest = $reqPrest->fetch()) {

            $contenu .= '<tr>
                        <td>'.$resultatForm['titre'].'</td>
                        <td>'.$resultatForm['date_debut'].'</td>
                        <td>'.$resultatForm['nb_place'].'</td>
                        <td>'.$resultatForm['nb_jour'].'</td>
                        <td>'.$resultatPrest['nom'].', email : <a href="mailto:'.$resultatPrest['mail'].'">'.$resultatPrest['mail'].'</td>
                        <td align="center">
                            <form method="POST">
                                <input type="hidden" name="id_f" value="'.$resultatForm['id_f'].'" />
                                <button type="submit" name="supprFormation" onclick="return(confirm(\'ATTENTION ! Êtes-vous sûr de vouloir supprimer la formation '.$resultatForm['titre'].' qui débute le '.date("d/m/Y", strtotime($resultatForm['date_debut'])).'?\'));" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            </form>
                        </td>
                     </tr>';

        }

    }

    $contenu .= '';

    return $contenu;
}

function affich_formation_salarie() {

    $req = recup_formation_salarie();

    $contenu = '';

    if($resultatForm = $req->rowCount() > 0) {

        while($resultatForm = $req->fetch()) {

            $reqPrest = recup_prestataire_idp($resultatForm['id_p']);

            while($resultatPrest = $reqPrest->fetch()) {

                $dateOriginal = $resultatForm['date_debut'];
                $newDate = date("d/m/Y", strtotime($dateOriginal));
                $newDateUrl = date("d-m-Y", strtotime($dateOriginal));

                $contenu .= '<tr>
                        <td>'.$resultatForm['titre'].'</td>
                        <td>'.$newDate.'</td>
                        <td>'.$resultatForm['nb_jour'].'</td>
                        <td>'.$resultatForm['nb_place'].'</td>
                        <td><a href="'.BASE_URL.'/details-formation/'.$resultatForm['titre'].'/'.$newDateUrl.'" class="btn btn-primary">Afficher les détails</a></td>
                     </tr>';

            }

        }

    } else {

        $contenu .= '<tr>
                        <td colspan="5" align="center">Il n\'y a aucune formation disponible pour le moment</td>
                     </tr>';

    }

    $contenu .= '';

    return $contenu;
}

function details_formation($titre, $dateUrl) {

    $reqFormation = recup_formation_detail($titre, $dateUrl);

    $contenu = '';

    while($resultatFormation = $reqFormation->fetch()) {

        $reqPrest = recup_prestataire_idp($resultatFormation['id_p']);

        while($resultatPrest = $reqPrest->fetch()) {

            $reqAdresse = recup_adresse_ida($resultatPrest['id_a']);

            while($resultatAdresse = $reqAdresse->fetch()) {

                $dateOriginal = $resultatFormation['date_debut'];
                $newDate = date("d/m/Y", strtotime($dateOriginal));

                $date_Fin = date('d/m/Y', strtotime($resultatFormation['date_debut']) + (24 * 3600 * $resultatFormation['nb_jour']));

                $contenu .= '<div class="panel-heading">
                        <h3>Détails de la formation '.$resultatFormation['titre'].' :</h3>
                    </div>
                    <br />
                    <div class="panel-body articles-container">
                        <div class="row">
                            <div class="col-md-4">
                                <h4><b>'.$resultatPrest['nom'].'</b></h4>
                                <p>'.$resultatAdresse['numero'].' '.$resultatAdresse['rue'].'</p>
                                <p>'.$resultatAdresse['code_postal'].', '.$resultatAdresse['ville'].'</p>
                                <p>'.$resultatPrest['mail'].'</p>
                                <p>'.$resultatPrest['tel'].'</p>
                                <hr />
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                <h4><b>Formation '.$resultatFormation['titre'].'</b></h4>
                                <p>Date de formation : <b>'.$newDate.'</b></p>
                                <p>Date de fin de formation : <b>'.$date_Fin.'</b></p>
                                <p>Nombre de jours de formation : <b>'.$resultatFormation['nb_jour'];
                if($resultatFormation['nb_jour'] >= 1) { $contenu .= ' jours'; } else {$contenu .= ' jour'; }
                $contenu .= '</b></p>
                            <p>Nombre de places restantes : <b>'.$resultatFormation['nb_place'].'</b></p>
                            <br />
                            <hr />
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>Description de la formation :</b></h4>
                                <p>'.$resultatFormation['contenu'].'</p>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <input type="hidden" value="'.$resultatFormation['id_f'].'" name="id_f" />
                                    <input type="hidden" value="'.$resultatFormation['titre'].'" name="titre" />
                                    <input type="hidden" value="'.$resultatFormation['nb_jour'].'" name="nb_jour" />
                                    <input type="hidden" value="'.$resultatFormation['nb_place'].'" name="nb_place" />
                                    <input type="hidden" value="'.$resultatFormation['date_debut'].'" name="dateDeb" />
                                    <input type="hidden" value="'.$_SESSION['credits'].'" name="credits" />
                                    <input type="hidden" value="'.$_SESSION['id_s'].'" name="id_s" />
                                    <button class="btn btn-primary" type="submit" name="validAjoutPanier"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ajouter au panier</button> 
                                </form>
                            </div>
                        </div>
                    </div>';


            }
        }
    }

    $contenu .= '';

    return $contenu;
}

function affichage_formation_attente($id_s) {

    $reqhistorique = affich_formation_attente($id_s);

    $contenu = '';

    if($resultat = $reqhistorique->rowCount() > 0) {

        while($resultat = $reqhistorique->fetch()) {

            $contenu .= '<tr id="'.$resultat['id_f'].'" class="'.$resultat['libelle'].'">
            <td>'.$resultat['titre'].'</td>
            <td>'.date("d/m/Y", strtotime($resultat['date_debut'])).'</td>
            <td>'.$resultat['nb_jour'].' jours de formation</td>
            <td><span class="indicator label-attente"></span> '.$resultat['libelle'].'</td>
        </tr>';
        }
    } else {

        $contenu .= '<tr><td colspan="5"></td></tr>
                     <tr>
                        <td align="center" colspan="5">Vous n\'avez aucune formation en attente</td>
                    </tr>';
    }

    $contenu .= "";

    return $contenu;
}

function update_layout_credits($id_s) {

    $req = recup_salarie($id_s);
    $resultatSalarie = $req->fetch();

    $_SESSION['credits'] = $resultatSalarie['credits'];
}

function select_chef() {

    $req = recup_salarie_chef();

    $contenu = '<select name="chef" class="form-control">
                    <option>-- Choix du chef --</option>';

    while($resultat = $req->fetch()) {
        $contenu .= '<option value="'.$resultat['id_s'].'">'.$resultat['nom'].' '.$resultat['prenom'].'</option>';
    }

    $contenu .= '</select>';

    return $contenu;
}

function tableau_liste_salarie() {

    $req = recup_tout_salarie();

    $contenu = '';

    if($resultat = $req->rowCount()) {

        while($resultat = $req->fetch()) {

            $contenu .= '<tr>
                        <td>'.$resultat['nom'].'</td>
                        <td>'.$resultat['prenom'].'</td>
                        <td>'.$resultat['email'].'</td>
                        <td>'.$resultat['credits'].'</td>
                        <td>';
            if($resultat['lvl'] == 1) { $contenu .= 'Salarié'; } elseif($resultat['lvl'] == 2) { $contenu .= 'Chef'; } elseif($resultat['lvl'] == 3) { $contenu .= 'Administrateur'; }

            $contenu .= '</td>
                    </tr>';

        }

    } else {

        $contenu .= '<tr>
                        <td colspan="5">Il n\'y a aucune demande de formation en cours</td>
                    </tr>';

    }

    $contenu .= '';

    return $contenu;
}

function tableau_liste_salarie_chef($id_chef) {

    $req = recup_salarie_selon_chef($id_chef);

    $contenu = '';

    if($resultat = $req->rowCount()) {

        while($resultat = $req->fetch()) {

            $contenu .= '<tr>
                        <td>'.$resultat['nom'].' '.$resultat['prenom'].'</td>
                        <td>'.$resultat['credits'].'</td>
                        <td>'.$resultat['email'].'</td>
                        <td>';
            if($resultat['lvl'] == 1) { $contenu .= 'Salarié'; } elseif($resultat['lvl'] == 2) { $contenu .= 'Chef'; } elseif($resultat['lvl'] == 3) { $contenu .= 'Administrateur'; }

            $contenu .= '</td>
                    </tr>';

        }

    } else {

        $contenu .= '<tr>
                        <td colspan="5">Vous n\'avez pas de salarié à votre charge</td>
                    </tr>';

    }

    $contenu .= '';

    return $contenu;
}

function tableau_chef_formation_attente($id_chef) {

    $contenu = '';

    $req = recup_tableau_chef_attente($id_chef);

    if($resultat = $req->rowCount()) {

        while($resultat = $req->fetch()) {

            $contenu .= '<tr>
                        <td>'.$resultat['titre'].'</td>
                        <td>'.date("d/m/Y", strtotime($resultat['date_debut'])).'</td>
                        <td>'.$resultat['nb_jour'].'</td>
                        <td>'.$resultat['nb_place'].'</td>
                        <td>'.$resultat['nom'].' '.$resultat['prenom'].'</td>
                        <td><span class="indicator label-attente"></span> '.$resultat['libelle'].'</td>
                        <td align="center">
                        <form method="POST">
                            <input type="hidden" name="id_t" value="'.$resultat['id_t'].'"/>
                            <button onclick="return(confirm(\'Êtes-vous sûr de vouloir confirmer la formation '.$resultat['titre'].' pour '.$resultat['nom'].' '.$resultat['prenom'].'?\'));" type="submit" name="confirmFormation" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            <button onclick="return(confirm(\'Êtes-vous sûr de vouloir refuser la formation '.$resultat['titre'].' pour '.$resultat['nom'].' '.$resultat['prenom'].'?\'));" type="submit" name="refuseFormation" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                        </form>
                    </tr>';

        }

    } else {

        $contenu .= '<tr><td colspan="6">Il n\'y a aucune formation en attente de vos salariés</td></tr>';

    }

    $contenu .= '';

    return $contenu;
}
?>