<?php

/*
----Creado----2020-07-08 18:41:44.546966 -0300 -03 m=+0.462012901
*/
include_once(app_path().'\model\geo_paises.php');

class Geo_paisesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Geo_paises();
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


	public function create($id,$nombre,$descripcion,$iso3,$codigo){


		$this->model->id=$id;
		$this->model->nombre=$nombre;
		$this->model->descripcion=$descripcion;
		$this->model->iso3=$iso3;
		$this->model->codigo=$codigo;

		return $this->model->create();
	}


	public function update($id,$nombre,$descripcion,$iso3,$codigo){

		$this->model->id=$id;
		$this->model->nombre=$nombre;
		$this->model->descripcion=$descripcion;
		$this->model->iso3=$iso3;
		$this->model->codigo=$codigo;

		return $this->model->update();
	}
}

?>