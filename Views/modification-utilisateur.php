<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h3 class="titre_marge">Modification des informations personnelles :</h3>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <h4 align="center"><?php if(isset($messageSalarie)) { echo $messageSalarie; } ?></h4>
                    <form method="POST">
                        <label>Nom :</label><input class="form-control" name="nom" type="text" value="<?php echo $resultatS['nom']; ?>"/>
                        <br />
                        <label>Prenom :</label><input class="form-control" name="prenom" type="text" value="<?php echo $resultatS['prenom']; ?>"/>
                        <br />
                        <label>email :</label><input class="form-control" name="email" type="email" value="<?php echo $resultatS['email']; ?>"/>
                        <br />
                        <label>Mot de passe :</label><input id="disabledInput" class="form-control" type="password" value="azertyuiop" disabled/>
                        <br />
                        <label>Crédits :</label><input class="form-control" name="credits" type="text" value="<?php echo $resultatS['credits']; ?>"/>
                        <br />
                        <input type="hidden" name="id_s" value="<?php echo $resultatS['id_s']; ?>">
                        <input class="btn btn-primary" type="submit" name="updateUser" value="Modifier les informations"/>
                    </form>
                </div>
                <div class="col-md-4">
                    <div align="center">
                        <br />
                        <input id="toggle" type="button" class="btn btn-warning" value="Supprimer cet utilisateur"/>
                        <br />
                        <br />
                    </div>
                    <div class="alert alert-warning" role="alert" id="divCache" style="visibility:hidden">
                        <p>Cette action est irréversible, si vous supprimez cet utilisateur il n'aura plus accès aux fonctionnalités de ce site ainsi qu'à l'historique de ses formations</p>
                        <br />
                        <form method="POST">
                            <input type="submit" class="btn btn-danger" name="supprUser" value="Confirmer"/>
                            <input type="button" onclick='window.location.reload(false)' class="btn btn-secondary" value="Annuler"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASE_URL; ?>/Views/assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){

        $('#toggle').click(function(){
            $('#divCache').css("visibility", "visible");
        });

    });
</script>