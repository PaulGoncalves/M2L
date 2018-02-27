<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Récupération mot de passe - M2L Formation</title>
	<link href="<?= BASE_URL; ?>/Views/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE_URL; ?>/Views/assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?= BASE_URL; ?>/Views/assets/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
                <?php if(isset($messageMdpOublie)){ echo '<br />'.$messageMdpOublie; } ?>
				<div class="panel-heading">Récupération du mot de passe</div>
				<div class="panel-body">
					<form method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Adresse email" name="email" type="email">
							</div>
                            <br />
							<input type="submit" class="btn btn-primary" value="Envoyer un nouveau mot de passe" name="submitMdpOublie" />
                        </fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	

<script src="<? BASE_URL; ?>/Views/assets/js/jquery-1.11.1.min.js"></script>
	<script src="<? BASE_URL; ?>/Views/assets/js/bootstrap.min.js"></script>
</body>
</html>
