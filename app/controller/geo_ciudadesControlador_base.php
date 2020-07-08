<?php

/*
----Creado----2020-07-08 18:41:44.3450746 -0300 -03 m=+0.260121501
*/
include_once(app_path().'\model\geo_ciudades.php');

class Geo_ciudadesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_ciudades();
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


	public function create($idEstado,$idPais){


		$this->model->idEstado=$idEstado;
		$this->model->idPais=$idPais;

		return $this->model->create();
	}


	public function update($id,$idEstado,$idPais){

		$this->model->id=$id;
		$this->model->idEstado=$idEstado;
		$this->model->idPais=$idPais;

		return $this->model->update();
	}
}

?>