<?php

/*
----Creado----2020-07-08 18:41:45.7184989 -0300 -03 m=+1.633545801
*/
include_once(app_path().'\model\temas.php');

class TemasController_base {

	private $model; 

	public function __construct(){
		$this->model = new Temas();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $id){

		$this->model->id= $id;
		return $this->model->getByPrim();
	}

	public function delByPrim( $id){

		$this->model->id= $id;
		return $this->model->delByPrim();
	}


	public function create($tema,$tipo){


		$this->model->tema=$tema;
		$this->model->tipo=$tipo;

		return $this->model->create();
	}


	public function update($id,$tema,$tipo){

		$this->model->id=$id;
		$this->model->tema=$tema;
		$this->model->tipo=$tipo;

		return $this->model->update();
	}
}

?>