<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h3 class="titre_marge">Ajout de salarié :</h3>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <h4 align="center"><?php if(isset($messageSalarie)) { echo $messageSalarie; } ?></h4>
                    <form method="POST">
                        <label>Nom :</label>
                        <input type="text" class="form-control" name="nom" />
                        <br />
                        <label>Prénom :</label>
                        <input type="text" class="form-control" name="prenom" />
                        <br />
                        <label>Adresse email :</label>
                        <input type="email" class="form-control" name="email" />
                        <br />
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp" />
                        <br />
                        <label>Confirmer mot de passe :</label>
                        <input type="password" class="form-control" name="mdp2" />
                        <br />
                        <label>Nombre de crédits :</label>
                        <input type="text" class="form-control" name="credits" />
                        <br />
                        <label>Statut du salarié :</label>
                        <select name="lvl" class="form-control">
                            <option value="3" >Administrateur</option>
                            <option value="2" >Chef</option>
                            <option value="1" >Salarié</option>
                        </select>

                        <div id="div_1" style="display:none;">
                            <br />
                            <label>Choix du chef :</label>
                            <?php echo select_chef(); ?>
                        </div>
                        <br />
                        <br />
                        <button type="submit" class="btn btn-primary" name="validSalarie"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ajouter le salarié</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h3 class="titre_marge">Liste des salariés :</h3>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Crédits</th>
                            <th>Statut</th>
                        </tr>
                        <?php echo tableau_liste_salarie(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>