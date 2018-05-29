<?php

function get_user($email, $mdp) {
    global $bdd;

    $reqUser = $bdd->prepare('SELECT * FROM salarie WHERE email =:email AND mdp = :mdp');
    $reqUser->bindValue(':email', $email);
    $reqUser->bindValue(':mdp', $mdp);
    $reqUser->execute();
    return $reqUser;
}

function verif_mail($email) {
    global $bdd;
    
    $req = $bdd->query('SELECT COUNT(*) AS nbr FROM salarie WHERE email = "'.$email.'"');
    
    
    return $req;
}

function recup_salarie($id_s) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie WHERE id_s = '.$id_s);

    return $req;
}

function recup_prestataire() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM prestataire');

    return $req;
}

function recup_prestataire_idp($id_p) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM prestataire WHERE id_p ='.$id_p);

    return $req;
}

function recup_adresse_ida($id_a) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM adresse WHERE id_a = '.$id_a);

    return $req;
}

function recup_adresse() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM adresse');

    return $req;
}

function recup_formation() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM formation');

    return $req;
}

function recup_formation_date() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY date_debut');

    return $req;
}

function recup_formation_libelle($id_s, $libelle) {
    global $bdd;
    
    $req = $bdd->query('SELECT * FROM type_formation WHERE id_s ='.$id_s.' AND libelle = "'.$libelle.'"');
    
    return $req;
}

function recup_derniere_formation_date() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY id_f DESC LIMIT 0, 5');

    return $req;
}

function recup_formation_salarie($depart, $fin) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY date_debut LIMIT '.$depart.', '.$fin);

    return $req;
}

function recup_formation_idf($id_f) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM formation WHERE id_f = '.$id_f);

    return $req;
}

function recup_pour_facture_pdf($id_s, $id_f) {
    global $bdd;

    $req = $bdd->query('SELECT t.id_f, t.id_t, t.libelle, t.id_s, f.titre,
                        f.nb_jour, f.date_debut, f.nb_place, f.contenu, f.id_f, f.id_p, s.nom, s.prenom, s.credits, a.numero, a.ville, a.rue, a.code_postal, p.id_p, p.nom p_nom, p.mail, p.tel
                        FROM type_formation t, formation f, salarie s, adresse a, prestataire p
                        WHERE f.id_f = t.id_f AND t.id_s = s.id_s AND f.id_p = p.id_p AND a.id_a = p.id_p
                        AND s.id_s = '.$id_s.' AND f.id_f = '.$id_f);
    
    return $req;

}

function recup_salarie_chef() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie WHERE lvl = 2');

    return $req;
}

function recup_tout_salarie() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie');

    return $req;
}

function recup_dernier_salarie_date() {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie ORDER BY id_s DESC LIMIT 0, 7');

    return $req;
}

function recup_formation_different_refusee() {
    global $bdd;
    
    $req = $bdd->query('SELECT * FROM type_formation WHERE libelle != "Refusée"');
    
    return $req;
}

function recup_salarie_selon_chef_pagination($id_chef, $depart, $fin) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie WHERE lvl != 2 AND id_chef = '.$id_chef.' LIMIT '.$depart.','.$fin);

    return $req;

}

function recup_salarie_selon_chef($id_chef) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM salarie WHERE lvl != 2 AND id_chef = '.$id_chef);

    return $req;

}

function recup_formation_acceptée() {
    global $bdd;

    $req = $bdd->query('SELECT f.nb_jour, f.date_debut, f.id_f, t.libelle, t.id_f FROM formation f, type_formation t WHERE f.id_f = t.id_f AND libelle = "Acceptée"');

    return $req;
}

function recup_historique_salarie($id_s) {
    global $bdd;

    $req = $bdd->query('SELECT t.id_f, t.id_t, t.libelle, t.id_s, f.titre, f.nb_jour, f.date_debut, f.nb_place, f.contenu, f.id_f, s.nom, s.prenom, s.credits FROM type_formation t, formation f, salarie s WHERE f.id_f = t.id_f AND t.id_s = s.id_s AND s.id_s = '.$id_s.' ORDER BY libelle DESC');

    return $req;

}

function recup_tableau_chef_attente($id_chef, $depart, $fin) {
    global $bdd;

    $req = $bdd->query('SELECT t.id_t, t.libelle, t.id_s, t.id_f, s.id_s, s.nom, s.prenom, s.id_chef, f.id_f, f.titre, f.date_debut, f.nb_place, f.nb_jour FROM type_formation t, salarie s, formation f WHERE t.id_s = s.id_s AND t.id_f = f.id_f AND t.libelle = "En Attente" AND s.id_chef = '.$id_chef.' LIMIT '.$depart.', '.$fin);

    return $req;
}

function recup_formation_detail($titre, $dateUrl) {
    global $bdd;

    $dateOriginal = $dateUrl;
    $newDate = date("Y-m-d", strtotime($dateOriginal));

    $req = $bdd->query('SELECT * FROM formation WHERE titre = "'.$titre.'" AND date_debut = "'.$newDate.'"');

    return $req;
}

function recup_libelle_formation($id_s, $id_f) {
    global $bdd;

    $req = $bdd->query('SELECT * FROM type_formation WHERE id_f = '.$id_f.' AND id_s = '.$id_s);

    return $req;

}

function insert_prestataire($adresse, $nom, $tel, $mail) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO prestataire(id_a, nom, tel, mail) VALUES(:id_a, :nom, :tel, :mail)');
    $req->bindValue(':id_a', $adresse);
    $req->bindValue(':nom', $nom);
    $req->bindValue(':tel', $tel);
    $req->bindValue(':mail', $mail);
    $req->execute();
}

function insert_PrestataireAdresse($rue, $numero, $ville, $code_postal, $nom, $tel, $mail) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO adresse(rue, numero, ville, code_postal) VALUES(:rue, :numero, :ville, :code_postal)');
    $req->bindValue(':rue', $rue);
    $req->bindValue(':numero', $numero);
    $req->bindValue(':ville', $ville);
    $req->bindValue(':code_postal', $code_postal);
    $req->execute();
    $id_a = $bdd->lastInsertId();

    $reqPrest = $bdd->prepare('INSERT INTO prestataire(id_a, nom, tel, mail) VALUES(:id_a, :nom, :tel, :mail)');
    $reqPrest->bindValue(':id_a', $id_a);
    $reqPrest->bindValue(':nom', $nom);
    $reqPrest->bindValue(':tel', $tel);
    $reqPrest->bindValue(':mail', $mail);
    $reqPrest->execute();
}

function insert_formation($titre, $nb_jour, $dateDeb, $nb_place, $prestataire, $contenu) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO formation(id_p, titre, contenu, date_debut, nb_jour, nb_place) VALUES(:id_p, :titre, :contenu, :date_debut, :nb_jour, :nb_place)');
    $req->bindValue(':id_p', $prestataire);
    $req->bindValue(':titre', $titre);
    $req->bindValue(':contenu', $contenu);
    $req->bindValue(':date_debut', $dateDeb);
    $req->bindValue(':nb_jour', $nb_jour);
    $req->bindValue(':nb_place', $nb_place);
    $req->execute();


}

function insert_salarie($nom, $prenom, $email, $mdp, $lvl, $credits, $id_chef) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO salarie(nom, prenom, email, mdp, lvl, credits, id_chef) VALUES(:nom, :prenom, :email, :mdp, :lvl, :credits, :id_chef)');
    $req->bindValue(':nom', $nom);
    $req->bindValue('prenom', $prenom);
    $req->bindValue('email', $email);
    $req->bindValue('mdp', $mdp);
    $req->bindValue('lvl', $lvl);
    $req->bindValue('credits', $credits);
    $req->bindValue('id_chef', $id_chef);
    $req->execute();
}

function insert_chef($nom, $prenom, $email, $mdp, $lvl, $credits, $id_chef) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO salarie(nom, prenom, email, mdp, lvl, credits, id_chef) VALUES(:nom, :prenom, :email, :mdp, :lvl, :credits, :id_chef)');
    $req->bindValue(':nom', $nom);
    $req->bindValue('prenom', $prenom);
    $req->bindValue('email', $email);
    $req->bindValue('mdp', $mdp);
    $req->bindValue('lvl', $lvl);
    $req->bindValue('credits', $credits);
    $req->bindValue('id_chef', $id_chef);
    $req->execute();
    $id_chef = $bdd->lastInsertId();
    
    $reqUp = $bdd->prepare('UPDATE salarie SET id_chef = :id_chef WHERE id_s = '.$id_chef);
    $reqUp->bindValue(':id_chef', $id_chef);
    $reqUp->execute();
}

function insert_libelle_formation($libelle, $id_f, $id_s) {
    global $bdd;

    $req = $bdd->prepare('INSERT INTO type_formation(libelle, id_f, id_s) VALUES(:libelle, :id_f, :id_s)');
    $req->bindValue(':libelle', $libelle);
    $req->bindValue(':id_f', $id_f);
    $req->bindValue(':id_s', $id_s);
    $req->execute();

}

function affich_formation_attente($id_s) {
    global $bdd;

    $reqhistorique = $bdd->query('SELECT type_formation.id_t, type_formation.libelle, type_formation.id_f, type_formation.id_s, formation.id_f, formation.titre, formation.contenu, formation.date_debut, formation.nb_jour, formation.nb_place, salarie.nom, salarie.prenom, salarie.credits
                        FROM formation 
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE salarie.id_s = '.$id_s.'
                        AND libelle = "En attente"
                        ORDER BY libelle DESC');

    return $reqhistorique;

}

function update_credit_salarie($id_s, $credits) {
    global $bdd;

    $req = $bdd->prepare('UPDATE salarie SET credits = :credits WHERE id_s = '.$id_s);
    $req->bindValue(':credits', $credits);
    $req->execute();

}

function updateLibelle($id_t, $libelle) {
    global $bdd;

    $req = $bdd->prepare('UPDATE type_formation SET libelle = :libelle WHERE id_t ='.$id_t);
    $req->bindValue(':libelle', $libelle);
    $req->execute();

}

function updateLibelleAcceptée($libelle) {
    global $bdd;

    $req = $bdd->prepare('UPDATE type_formation SET libelle = :libelle WHERE libelle = "Acceptée"');
    $req->bindValue(':libelle', $libelle);
    $req->execute();

}

function update_place_formation($placeDispo, $id_f) {
    global $bdd;

    $req = $bdd->prepare('UPDATE formation SET nb_place = :nb_place WHERE id_f = '.$id_f);
    $req->bindValue(':nb_place', $placeDispo);
    $req->execute();

}

function update_mdp_salarie($email, $mdp) {
    global $bdd;
    
    $req = $bdd->prepare('UPDATE salarie SET mdp = :mdp WHERE email = "'.$email.'"');
    $req->bindValue(':mdp', $mdp);
    $req->execute();
    
}

function update_salarie($id_s, $nom, $prenom, $email, $credits) {
    global $bdd;
    
    $req = $bdd->prepare('UPDATE salarie SET nom = :nom, prenom = :prenom, email = :email, credits = :credits WHERE id_s = '.$id_s);
    $req->bindValue(':nom', $nom);
    $req->bindValue(':prenom', $prenom);
    $req->bindValue(':email', $email);
    $req->bindValue(':credits', $credits);
    $req->execute();
    
}

function delete_formation($id_f) {
    global $bdd;

    $req = $bdd->prepare('DELETE FROM formation WHERE id_f = '.$id_f);
    $req->execute();

}

function delete_user($id_s) {
    global $bdd;

    $req = $bdd->prepare('DELETE FROM salarie WHERE id_s = '.$id_s);
    $req->execute();

}

function recherche_formation($recherche) {
    global $bdd;
    
    $req = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 AND titre LIKE "%'.$recherche.'%" OR date_debut LIKE "%'.$recherche.'%" OR contenu LIKE "%'.$recherche.'%" ORDER BY date_debut');
    
    
    return $req;
}

?>