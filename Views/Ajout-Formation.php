<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h4 align="center"><?php if(isset($messageFormation)) {echo $messageFormation;} ?></h4>
            <h3 class="titre_marge">Ajout de formations :</h3>
            <hr />
            <table class="table">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <br />
                            <label>Titre :</label>
                            <input type="text" class="form-control" name="titre"/>
                        </div>
                        <div class="col-md-6">
                            <br />
                            <label>Coût (En nbs de jours) :</label>
                            <input type="text" class="form-control" name="nb_jour"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <br />
                            <label>Date de début :</label>
                            <input type="date" class="form-control" name="dateDeb"/>
                        </div>
                        <div class="col-md-6">
                            <br />
                            <label>Nombre de place :</label>
                            <input type="text" class="form-control" name="nb_place"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <br />
                            <label>Prestataire : (Si le prestataire n'est pas dans la liste veuillez l'ajouter <a href="<?= BASE_URL; ?>/Ajout-Prestataire">ici</a>)</label>
                            <?php echo affiche_prestataireFormation(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br />
                            <label>Description de la formation :</label>
                            <textarea type="date" class="form-control" name="contenu"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Ajouter la formation" name="validFormation"/>
                        </div>
                    </div>
                </form>
            </table>
        </div>
    </div>
</div>