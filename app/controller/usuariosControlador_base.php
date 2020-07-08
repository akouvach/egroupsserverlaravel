<?php

/*
----Creado----2020-07-08 18:41:45.9622406 -0300 -03 m=+1.877287501
*/
include_once(app_path().'\model\usuarios.php');

class UsuariosController_base {

	private $model; 

	public function __construct(){
		$this->model = new Usuarios();
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


	public function create($nombre,$apellido,$email,$usuario,$genero,$fecha_nac,$pass){


		$this->model->nombre=$nombre;
		$this->model->apellido=$apellido;
		$this->model->email=$email;
		$this->model->usuario=$usuario;
		$this->model->genero=$genero;
		$this->model->fecha_nac=$fecha_nac;
		$this->model->pass=$pass;

		return $this->model->create();
	}


	public function update($id,$nombre,$apellido,$email,$usuario,$genero,$fecha_nac,$pass){

		$this->model->id=$id;
		$this->model->nombre=$nombre;
		$this->model->apellido=$apellido;
		$this->model->email=$email;
		$this->model->usuario=$usuario;
		$this->model->genero=$genero;
		$this->model->fecha_nac=$fecha_nac;
		$this->model->pass=$pass;

		return $this->model->update();
	}
}

?>