<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= BASE_URL; ?>">
            <em class="fa fa-home"></em>
            </a></li>
        <li><a href="<?= BASE_URL; ?>">Dashboard</a></li>
        <li class="active">Gestion formation</li>
    </ol>
</div> <!-- ****************** BARRE AVEC LIENS ********************** -->

<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <br />
        <div class="panel panel-default articles">
            <div class="panel-heading">
                <h3>Les formations en attentes :</h3>
            </div>
            <div class="panel-body articles-container">
                <table class="table table-striped">
                    <tr>
                        <th>Nom de la formation</th>
                        <th>Date de début</th>
                        <th>Coût (En nbs de jours)</th>
                        <th>Nombre de places restantes</th>
                        <th>Nom du salarié</th>
                        <th>État</th>
                        <th>Accepter - Refuser</th>
                    </tr>
                    <?php echo tableau_chef_formation_attente($_SESSION['id_s']); ?>
                </table>
            </div>
            <br />
            <br />
            <div class="panel-heading">
                <h3>Liste des salariés à votre charge :</h3>
            </div>
            <div class="panel-body articles-container">
                <table class="table table-striped">
                    <tr>
                        <th>Nom</th>
                        <th>Crédits (En nbs de jours)</th>
                        <th>Email</th>
                        <th>Niveau</th>
                    </tr>
                    <?php echo tableau_liste_salarie_chef($_SESSION['id_s']); ?>
                </table>
            </div>
        </div>
    </div>
</div>