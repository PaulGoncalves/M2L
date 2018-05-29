<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= BASE_URL; ?>">
            <em class="fa fa-home"></em>
            </a></li>
        <li><a href="<?= BASE_URL; ?>">Dashboard</a></li>
        <li class="active">Profil</li>
    </ol>
</div> <!-- ****************** BARRE AVEC LIENS ********************** -->

<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <?php if(isset($messageProfil)) { echo $messageProfil; } ?>
        <br />
        <div class="panel panel-default articles">
            <div class="panel-heading">
                <h3>Votre profil :</h3>
            </div>
            <div class="panel-body articles-container">
                <div class="row">
                    <div class="col-md-8">
                        <label>Nom</label>
                        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_SESSION['nom'] ?>" disabled/>
                        <br />
                        <label>Prénom</label>
                        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_SESSION['prenom'] ?>" disabled/>
                        <br />
                        <label>Email</label>
                        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_SESSION['email'] ?>" name="email" disabled/>
                        <br />
                        <label>Nombre de crédits (En nbs de jours)</label>
                        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_SESSION['credits'] ?>" name="email" disabled/>
                    </div>
                </div>
                <br />
                <hr />
                <h3>Modifier votre mot de passe :</h3>
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST">
                            <br />
                            <label>Ancien mot de passe</label>
                            <input type="password" class="form-control" name="ancienMdp"/>
                            <br />
                            <label>Nouveau mot de passe</label>
                            <input type="password" class="form-control" name="Mdp"/>
                            <br />
                            <label>Confirmer mot de passe</label>
                            <input type="password" class="form-control" name="confirmMdp"/>
                            <br />
                            <button class="btn btn-primary" name="validNewMdp">Modifer votre mot de passe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>