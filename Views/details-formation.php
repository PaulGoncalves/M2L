<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= BASE_URL; ?>">
            <em class="fa fa-home"></em>
            </a></li>
        <li><a href="<?= BASE_URL; ?>">Dashboard</a></li>
        <li><a href="<?= BASE_URL; ?>/Formations">Formations</a></li>
        <li class="active">Détails formation</li>
    </ol>
</div> <!-- ****************** BARRE AVEC LIENS ********************** -->


<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <br />
        <div class="panel panel-default articles">
            <div align="center"><?php if(isset($messageAjoutFormation)) { echo $messageAjoutFormation; } ?></div>
            <?php echo details_formation($_GET['titre'], $_GET['date']); ?>
        </div>
    </div>
</div>