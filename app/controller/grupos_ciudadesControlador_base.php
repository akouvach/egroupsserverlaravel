<?php

/*
----Creado----2020-07-09 11:42:49.8958961 -0300 -03 m=+0.318579701
*/
include_once(app_path().'\model\grupos_ciudades.php');

include_once(app_path().'\core\conexion.php');

class Grupos_ciudadesController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Grupos_ciudades($this->pdo);
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