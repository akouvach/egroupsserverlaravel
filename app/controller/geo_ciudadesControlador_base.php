<?php

/*
----Creado----2020-07-09 11:42:49.6857377 -0300 -03 m=+0.108421301
*/
include_once(app_path().'\model\geo_ciudades.php');

include_once(app_path().'\core\conexion.php');

class Geo_ciudadesController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Geo_ciudades($this->pdo);
		} catch (Exception $ex){
			throw $ex;
		}
	}


	public function __get($name){
		return $this->$name;
	}


	public function __set($name, $value){
		$this->$name = $value;
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