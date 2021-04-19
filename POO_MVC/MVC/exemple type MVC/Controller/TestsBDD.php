<?php

namespace Controller;

use App\Exception\NotFoundException;
use Model\TestModel;

class TestsBDD {

	protected $model;

	public function __construct() {
		$this->model = new TestModel();
	}

	public function printAll() {
		$trucsAAfficher = $this->model->getAll();

		view('test-bdd/all', [
			'trucsAAfficher' => $trucsAAfficher
		]);
	}

	public function printOne($id) {
		
		$truc = $this->model->getOne($id);
		
		if (empty($truc)) throw new NotFoundException('Truc non trouvé !');

		view('test-bdd/one', [
			'truc' => $truc
		]);
	}
}
