<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h4 align="center"><?php if(isset($messageFormation)) {echo $messageFormation;} ?></h4>
            <h3 class="titre_marge">Gestion des formations :</h3>
            <br />
            <br />
            <table class="table table-striped">
                <tr>
                    <th>Titre</th>
                    <th>Date de début</th>
                    <th>Nombre de places restantes</th>
                    <th>Coût (En nbs de jours)</th>
                    <th>Prestataire</th>
                    <th>Supprimer la formation</th>
                </tr>
                <?php echo affich_formation_admin(); ?>
            </table>
        </div>
    </div>
</div>