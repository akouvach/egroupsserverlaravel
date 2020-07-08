<?php

/*
----Creado----2020-07-08 18:41:45.4455931 -0300 -03 m=+1.360640001
*/
include_once(app_path().'\model\sec_roles_permisos.php');

class Sec_roles_permisosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Sec_roles_permisos();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $idRol, $idMenu){

		$this->model->idRol= $idRol;,
		$this->model->idMenu= $idMenu;
		return $this->model->getByPrim();
	}

	public function delByPrim( $idRol, $idMenu){

		$this->model->idRol= $idRol;,
		$this->model->idMenu= $idMenu;
		return $this->model->delByPrim();
	}


	public function create($idRol,$idMenu,$fechaDesde){


		$this->model->idRol=$idRol;
		$this->model->idMenu=$idMenu;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->create();
	}


	public function update($idRol,$idMenu,$fechaDesde){

		$this->model->idRol=$idRol;
		$this->model->idMenu=$idMenu;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->update();
	}
}

?>