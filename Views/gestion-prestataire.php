<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h4 align="center"><?php if(isset($messageFormation)) {echo $messageFormation;} ?></h4>
            <h3 class="titre_marge">Gestion des prestataires disponibles :</h3>
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
        </div>
    </div>
</div>