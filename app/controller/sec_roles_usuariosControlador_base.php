<?php

/*
----Creado----2020-07-07 09:18:39.2521457 -0300 -03 m=+0.453959501
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
		return $this->model->getByPrim( $idUsuario, $idRol, $fechaDesde);
	}

	public function delByPrim( $idUsuario, $idRol, $fechaDesde){
		return $this->model->delByPrim( $idUsuario, $idRol, $fechaDesde);
	}
}
?>