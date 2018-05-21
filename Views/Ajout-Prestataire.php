<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h4 align="center"><?php if(isset($messageFormation)) {echo $messageFormation;} ?></h4>
            <h3 class="titre_marge">Les prestataires disponible :</h3>
            <hr />
            <table class="table table-striped">
                <tr>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Adresse</th>
                </tr>
                <?php echo affich_prestataire(); ?>
            </table>
            <br />
            <br />
            <h3 class="titre_marge">Les prestataires disponible :</h3>
            <hr />
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <br />
                        <label>Nom : </label><input class="form-control" type="text" placeholder="Entrez le nom du prestataire" name="nom" />
                        <br />
                        <label>Email : </label><input class="form-control" type="email" placeholder="Entrez l'adresse email du prestataire" name="mail" />
                    </div>
                    <div class="col-md-6">
                        <br />
                        <label>Téléphone : </label><input class="form-control" type="text" placeholder="Entrez le téléphone du prestataire" name="tel"/>
                    </div>
                </div>
                <br />
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Choisir une adresse existante <span class=" glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <?php echo affich_adresse(); ?>
                                            <br />
                                            <input type="submit" class="btn btn-primary" value="Ajouter le prestataire" name="validPrestataire1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Ajouter une nouvelle adresse <span class=" glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <br />
                                            <label>Numéro : </label><input class="form-control" type="number" placeholder="Numéro" name="numero"/>
                                            <br />
                                            <label>Code postal : </label><input class="form-control" type="number" placeholder="Code postal" name="code_postal" />
                                        </div>
                                        <div class="col-md-6">
                                            <br />
                                            <label>Voie : </label><input class="form-control" type="text" placeholder="Avenue de la république" name="rue"/>
                                            <br />
                                            <label>Ville : </label><input class="form-control" type="text" placeholder="Ville" name="ville"/>
                                        </div>
                                        <div class="col-md-6">
                                            <br />
                                            <input type="submit" class="btn btn-primary" value="Ajouter le prestataire" name="validPrestataire2"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>