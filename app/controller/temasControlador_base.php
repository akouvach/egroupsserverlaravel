<?php

/*
----Creado----2020-07-12 06:50:02.7757568 -0300 -03 m=+2.044069601
*/
include_once(app_path().'\model\temas.php');

include_once(app_path().'\core\conexion.php');

class TemasController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Temas($this->pdo);
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


	public function create($tema,$tipo){


		$this->model->tema=$tema;
		$this->model->tipo=$tipo;

		return $this->model->create();
	}


	public function update($id,$tema,$tipo){

		$this->model->id=$id;
		$this->model->tema=$tema;
		$this->model->tipo=$tipo;

		return $this->model->update();
	}
}

?>