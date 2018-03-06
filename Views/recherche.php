<div class="row">
    <div class="col-md-12">
        <br />
        <div class="panel panel-default articles">
            <h3 class="titre_marge">Rechercher dans formation : <b><i><?php echo $recherche; ?></i></b></h3>
            <hr />
            <div class="row">
                <div class="col-md-12">
                <h3>Resultats :</h3>
                <br />
                <?php echo recherche($_POST['recherche']); ?>
                </div>
            </div>
        </div>
    </div>
</div>