<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/Views/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/Views/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/Views/css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <title><?php echo $title; ?></title>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-4 col-md-4 form_login">
                        <form method="POST">
                            <h3 class="titre_login">Connexion</h3>
                            <br />
                            <label class="text_login">Adresse email :</label><input class="form-control" type="text" name="Votre email" placeholder="Identifiant"/>
                            <label class="text_login">Mot de passe :</label><input class="form-control" type="password" name="mdp" placeholder="Votre mot de passe"/>
                            <br />
                            <div align="center">
                                <label><input type="checkbox" /> Se souvenir de moi</label>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-default bouton_login" value="connexion" name="validInscription"/>
                            
                            <div align="center">
                               <br />
                                <a class="lienMdpOublie" href="#">Mot de passe oublié ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <script type="text/javascript" src="<?= BASE_URL; ?>/Views/css/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL; ?>/Views/css/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL; ?>/Views/css/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?= BASE_URL; ?>/Views/css/js/navBar.js"></script>
    </body>
</html>
