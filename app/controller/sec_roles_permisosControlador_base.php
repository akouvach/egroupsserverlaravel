<?php

/*
----Creado----2020-07-07 09:18:39.2341938 -0300 -03 m=+0.436007601
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
		return $this->model->getByPrim( $idRol, $idMenu);
	}

	public function delByPrim( $idRol, $idMenu){
		return $this->model->delByPrim( $idRol, $idMenu);
	}
}
?>