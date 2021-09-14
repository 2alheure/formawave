<?php include DOSSIER_VIEWS . '/parties/header.html.php'; ?>

<div class="container">
	<?php foreach ($contacts as $contact) : ?>
		<div class="card my-2">
			<div class="card-body">
				<h4 class="card-title">
					<?= $contact->prenom ?> <?= strtoupper($contact->nom) ?>
				</h4>
				<p class="card-text">
					<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;
					<a href="tel:<?= $contact->telephone ?>">
						<?= $contact->telephone ?>
					</a>
				</p>
				<p class="my-2">
					<a 
						class="btn btn-danger" 
						href="<?= url('supprimer-contact&id=' . $contact->id) ?>" 
						role="button"
						onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');"
					>Supprimer</a>
				</p>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php include DOSSIER_VIEWS . '/parties/footer.html.php'; ?>