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
                <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                    <div class="large"><?php echo compte_formation(); ?></div>
                    <div class="text-muted">formations</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><span style="font-size:23px;" class="glyphicon glyphicon-list-alt color-orange" aria-hidden="true"></span>
                    <div class="large"><?php echo compte_inscription_formation(); ?></div>
                    <div class="text-muted">Inscription au formations</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large"><?php echo compte_salarie(); ?></div>
                    <div class="text-muted">salariés</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><span style="font-size:23px;" class="glyphicon glyphicon-home color-red" aria-hidden="true"></span>
                    <div class="large"><?php echo compte_prestataire(); ?></div>
                    <div class="text-muted">Prestataires inscrits </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default chat">
            <div class="panel-heading">
                Liste des derniers salariés ajoutés
                <ul class="pull-right panel-settings panel-button-tab-right">
                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                        <em class="fa fa-plus"></em>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="dropdown-settings">
                                    <li><a href="<?= BASE_URL; ?>/gestion-salarie">
                                        <em class="fa fa-list"></em> Afficher tous les salariés
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
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Crédits</th>
                    </tr>
                    <?php echo tableau_dernier_salarie_dashbord(); ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <div>
                        <a class="btn btn-primary" href="<?= BASE_URL; ?>/gestion-salarie">Afficher tous les salariés</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.col-->
    <div class="col-md-6">
        <div class="panel panel-default chat">
            <div class="panel-heading">
                Dernières formations ajoutées
                <ul class="pull-right panel-settings panel-button-tab-right">
                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                        <em class="fa fa-plus"></em>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="dropdown-settings">
                                    <li><a href="<?= BASE_URL; ?>/Formations">
                                        <em class="fa fa-list"></em> Afficher toutes les formations
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
                        <th>Date</th>
                        <th>Détails</th>
                    </tr>
                    <?php echo tableau_derniere_formation_dashbord(); ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <div>
                        <a class="btn btn-primary" href="<?= BASE_URL; ?>/Formations">Afficher toutes les formations</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.col-->
</div><!--/.row-->



<div class="row">
    
</div><!--/.row-->