<?php

/*
----Creado----2020-07-12 06:50:01.2834639 -0300 -03 m=+0.551776701
*/
include_once(app_path().'\model\emociones.php');

include_once(app_path().'\core\conexion.php');

class EmocionesController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Emociones($this->pdo);
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


	public function create($id,$emocion){


		$this->model->id=$id;
		$this->model->emocion=$emocion;

		return $this->model->create();
	}


	public function update($id,$emocion){

		$this->model->id=$id;
		$this->model->emocion=$emocion;

		return $this->model->update();
	}
}

?>