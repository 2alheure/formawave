<?php

function ajouter_tel() {
	include DOSSIER_VIEWS . '/ajouter-tel.html.php';
}

function ajouter_tel_handler() {
	if (
		// Je vérifie que j'ai tout
		!empty($_POST['nom'])
		&& !empty($_POST['prenom'])
		&& !empty($_POST['tel'])

		&& is_numeric($_POST['tel'])
	) {

		/**
		 * J'insère mon nouveau contact
		 */
		// J'appelle mon modèle
		require DOSSIER_MODELS . '/Contact.php';

		$contact = new Contact;
		$contact->nom = $_POST['nom'];
		$contact->prenom = $_POST['prenom'];
		$contact->telephone = $_POST['tel'];

		$contact->save();

		redirection('liste-contacts');
	} else {
		// echo 'Apprends à remplir un formulaire imbécile.';
		redirection('ajouter-contact');
	}
}

function afficher_les_contacts() {
	require DOSSIER_MODELS . '/Contact.php';
	$contacts = Contact::all();
	include DOSSIER_VIEWS . '/liste-contacts.html.php';
}

function supprimer_un_contact() {
	if (!empty($_GET['id'])) {

		require DOSSIER_MODELS . '/Contact.php';
		$contact_a_supprimer = Contact::retrieveByField('id', $_GET['id'], SimpleOrm::FETCH_ONE);

		if ($contact_a_supprimer === null) erreur404();

		$contact_a_supprimer->delete();
		redirection('liste-contacts');
	} else {
		erreur404();
	}
}
