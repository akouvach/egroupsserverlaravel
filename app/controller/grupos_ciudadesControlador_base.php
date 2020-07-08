<?php

/*
----Creado----2020-07-08 18:41:44.7996793 -0300 -03 m=+0.714726201
*/
include_once(app_path().'\model\grupos_ciudades.php');

class Grupos_ciudadesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Grupos_ciudades();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $idCiudad, $idGrupo, $fechaDesde){

		$this->model->idCiudad= $idCiudad;,
		$this->model->idGrupo= $idGrupo;,
		$this->model->fechaDesde= $fechaDesde;
		return $this->model->getByPrim();
	}

	public function delByPrim( $idCiudad, $idGrupo, $fechaDesde){

		$this->model->idCiudad= $idCiudad;,
		$this->model->idGrupo= $idGrupo;,
		$this->model->fechaDesde= $fechaDesde;
		return $this->model->delByPrim();
	}


	public function create($idCiudad,$idGrupo,$fechaDesde){


		$this->model->idCiudad=$idCiudad;
		$this->model->idGrupo=$idGrupo;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->create();
	}


	public function update($idCiudad,$idGrupo,$fechaDesde){

		$this->model->idCiudad=$idCiudad;
		$this->model->idGrupo=$idGrupo;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->update();
	}
}

?>