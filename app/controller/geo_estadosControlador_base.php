<?php

/*
----Creado----2020-07-08 18:41:44.4273389 -0300 -03 m=+0.342385801
*/
include_once(app_path().'\model\geo_estados.php');

class Geo_estadosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_estados();
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


	public function create($estado,$idPais){


		$this->model->estado=$estado;
		$this->model->idPais=$idPais;

		return $this->model->create();
	}


	public function update($id,$estado,$idPais){

		$this->model->id=$id;
		$this->model->estado=$estado;
		$this->model->idPais=$idPais;

		return $this->model->update();
	}
}

?>