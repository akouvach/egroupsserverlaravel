<?php

/*
----Creado----2020-07-08 18:41:45.5841459 -0300 -03 m=+1.499192801
*/
include_once(app_path().'\model\sec_roles_usuarios.php');

class Sec_roles_usuariosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Sec_roles_usuarios();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $idUsuario, $idRol, $fechaDesde){

		$this->model->idUsuario= $idUsuario;,
		$this->model->idRol= $idRol;,
		$this->model->fechaDesde= $fechaDesde;
		return $this->model->getByPrim();
	}

	public function delByPrim( $idUsuario, $idRol, $fechaDesde){

		$this->model->idUsuario= $idUsuario;,
		$this->model->idRol= $idRol;,
		$this->model->fechaDesde= $fechaDesde;
		return $this->model->delByPrim();
	}


	public function create($idUsuario,$idRol,$fechaDesde){


		$this->model->idUsuario=$idUsuario;
		$this->model->idRol=$idRol;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->create();
	}


	public function update($idUsuario,$idRol,$fechaDesde){

		$this->model->idUsuario=$idUsuario;
		$this->model->idRol=$idRol;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->update();
	}
}

?>