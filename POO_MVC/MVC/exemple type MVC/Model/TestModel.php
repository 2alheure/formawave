<?php

namespace Model;

use App\BaseModel;

class TestModel extends BaseModel {

	public function getAll() {
		return $this->bdd
			->query('SELECT * FROM test_table')
			->fetchAll();
	}

	public function getOne($id) {
		$statement = $this->bdd->prepare('SELECT * FROM test_table WHERE id = ?');
		$statement->bindParam(1, $id);
		$statement->execute();
		return $statement->fetch();
	}
}
