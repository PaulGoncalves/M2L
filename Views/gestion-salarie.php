<div class="row">
    <div class="col-md-12">
        <h4 align="center"><?php if(isset($messageSalarie)) { echo $messageSalarie; } ?></h4>
        <br />
        <div class="panel panel-default articles">
            <h3 class="titre_marge">Gestion des salariés :</h3>
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
                            <th>Mise à jour des infos</th>
                        </tr>
                        <?php echo tableau_liste_salarie(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>