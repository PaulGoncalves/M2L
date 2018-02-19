<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= BASE_URL; ?>">
            <em class="fa fa-home"></em>
            </a></li>
        <li><a href="<?= BASE_URL; ?>">Dashboard</a></li>
        <li class="active">Historique de formation</li>
    </ol>
</div> <!-- ****************** BARRE AVEC LIENS ********************** -->


<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <br />
        <div class="panel panel-default articles">
            <div class="panel-heading">
                <h3>Mon historique de formation :</h3>
            </div>
            <div class="panel-body articles-container">
                <table class="table">
                    <tr>
                        <th>Nom de la formation</th>
                        <th>Date de début</th>
                        <th>Coût (En nbs de jours)</th>
                        <th>État</th>
                        <th>Imprimer la facture</th>
                    </tr>
                    <?php echo tableau_historique_salarie($_SESSION['id_s']); ?>
                </table>
            </div>
        </div>
    </div>
</div>