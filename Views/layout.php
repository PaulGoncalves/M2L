<?php 
update_layout_credits($_SESSION['id_s']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php if(isset($title)) { echo $title; } else { echo 'M2L Formation'; } ?></title>
        <link href="<?= BASE_URL; ?>/Views/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/Views/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/Views/assets/css/datepicker3.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/Views/assets/css/styles.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="<?= BASE_URL; ?>/Views/images/M2L-favicon.png" />

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="<?= BASE_URL; ?>"><span>FORM</span>ATION M2L</a>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle count-info" href="<?= BASE_URL; ?>/Profil">
                            <em class="fa fa-user"></em>
                            </a>
                        </li>
                        <li class="dropdown"><a onclick="return(confirm('ATTENTION ! Êtes-vous sûr de vouloir vous déconnecter ?'));" class="dropdown-toggle count-info" href="<?= BASE_URL; ?>/Deconnexion">
                            <em class="fa fa-power-off">&nbsp;</em>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>En ligne</div>
                    <div class="profile-usertitle-status">Crédit disponible : <?php if(isset($_SESSION['credits'])) { echo $_SESSION['credits']; } ?> jours</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <div class="form-group">
                <form method="POST" action="<?= BASE_URL; ?>/Recherche">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" name="recherche" class="search-query form-control" placeholder="Chercher une formation" />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="validSearch" type="submit">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav menu">
                <?php echo menu_lvl($_SESSION['lvl'], $_GET['p']); ?>
                <li><a onclick="return(confirm('ATTENTION ! Êtes-vous sûr de vouloir vous déconnecter ?'));" href="<?= BASE_URL; ?>/Deconnexion"><em class="fa fa-power-off">&nbsp;</em> Déconnexion</a></li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <?php echo $content; ?>

        </div>	<!--/.main-->




        <script src="<?= BASE_URL; ?>/Views/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/bootstrap.min.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/chart.min.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/chart-data.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/easypiechart.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/easypiechart-data.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?= BASE_URL; ?>/Views/assets/js/custom.js"></script>

        <script>
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };
        </script>

        <script type="text/javascript">
            // Je sélectionne le select et quand la valeur change on fait une action
            $('select[name="lvl"]').change(function(){
                if ($('select[name="lvl"]').val() == 1)
                    $('#div_1').show(500);
                if ($('select[name="lvl"]').val() != 1)
                    $('#div_1').hide(500);
            });
        </script>

    </body>
</html>