<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <br />
        <div class="panel panel-default articles">
            <div align="center"><?php if(isset($messageAjoutFormation)) { echo $messageAjoutFormation; } ?></div>
                <?php echo details_formation($_GET['titre'], $_GET['date']); ?>
        </div>
    </div>
</div>