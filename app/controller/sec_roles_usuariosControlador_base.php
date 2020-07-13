<?php

/*
----Creado----2020-07-12 06:50:02.6131766 -0300 -03 m=+1.881489401
*/
include_once(app_path().'\model\sec_roles_usuarios.php');

include_once(app_path().'\core\conexion.php');

class Sec_roles_usuariosController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Sec_roles_usuarios($this->pdo);
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