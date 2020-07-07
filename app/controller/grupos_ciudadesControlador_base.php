<?php

/*
----Creado----2020-07-07 09:18:39.1015573 -0300 -03 m=+0.303371501
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
		return $this->model->getByPrim( $idCiudad, $idGrupo, $fechaDesde);
	}

	public function delByPrim( $idCiudad, $idGrupo, $fechaDesde){
		return $this->model->delByPrim( $idCiudad, $idGrupo, $fechaDesde);
	}
}
?>