<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div><!--/.row-->

<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-check color-blue"></em>
                    <div class="large"><?php echo compte_formation_libelle($_SESSION['id_s'], 'Effectuée'); ?></div>
                    <div class="text-muted">Formation(s) effectuée(s)</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-calendar color-orange"></em>
                    <div class="large"><?php echo compte_formation_libelle($_SESSION['id_s'], 'En attente'); ?></div>
                    <div class="text-muted">Formation(s) en attente(s)</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-remove color-red"></em>
                    <div class="large"><?php echo compte_formation_libelle($_SESSION['id_s'], 'Refusée'); ?></div>
                    <div class="text-muted">Formation(s) refusée(s)</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-list color-teal"></em>
                    <div class="large"><?php echo compte_formation(); ?></div>
                    <div class="text-muted">Formations disponibles</div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Vos formations en attente
                <ul class="pull-right panel-settings panel-button-tab-right">
                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                        <em class="fa fa-plus"></em>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="dropdown-settings">
                                    <li><a href="<?= BASE_URL; ?>/historique-formation">
                                        <em class="fa fa-list"></em> Historique de formations
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <table class="table">
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Coût de la formation</th>
                            <th>Status</th>
                        </tr>
                        <?php echo affichage_formation_attente($_SESSION['id_s']); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default chat">
            <div class="panel-heading">
                    Historiques des dernières formations
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                            <em class="fa fa-plus"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="<?= BASE_URL; ?>/historique-formation">
                                            <em class="fa fa-list"></em> Toutes les formations
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Titre</th>
                        <th>Date début</th>
                        <th>État</th>
                        <th></th>
                    </tr>
                    <?php echo tableau_historique_dashbord($_SESSION['id_s']); ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <div>
                        <a class="btn btn-primary" href="<?= BASE_URL; ?>/historique-formation">Afficher l'historique complet</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.col-->

    <div class="col-md-6">
        <div class="panel panel-default chat">
            <div class="panel-heading">
                Liste des dernières formations ajoutées
                <ul class="pull-right panel-settings panel-button-tab-right">
                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                        <em class="fa fa-plus"></em>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="dropdown-settings">
                                    <li><a href="<?= BASE_URL; ?>/formations">
                                        <em class="fa fa-list"></em> Toutes les formations
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Titre</th>
                        <th>Date début</th>
                        <th>Détails</th>
                        <th></th>
                    </tr>
                    <?php echo tableau_derniere_formation_dashbord(); ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <div>
                        <a class="btn btn-primary" href="<?= BASE_URL; ?>/formations">Afficher toutes les formations</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.col-->

</div><!--/ row -->
