<?php include DOSSIER_VIEWS . '/parties/header.html.php'; ?>

<div class="container">
	<form action="<?= url('ajouter-contact-handler') ?>" method="post">
		<div class="form-group row">
			<label for="prenom" class="col-sm-1-12 col-form-label">Prénom</label>
			<div class="col-sm-1-12">
				<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
			</div>
		</div>
		<div class="form-group row">
			<label for="nom" class="col-sm-1-12 col-form-label">Nom</label>
			<div class="col-sm-1-12">
				<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
			</div>
		</div>
		<div class="form-group row">
			<label for="tel" class="col-sm-1-12 col-form-label">Téléphone</label>
			<div class="col-sm-1-12">
				<input type="tel" class="form-control" name="tel" id="tel" placeholder="Téléphone">
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
</div>

<?php include DOSSIER_VIEWS . '/parties/footer.html.php';
