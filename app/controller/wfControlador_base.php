<?php

/*
----Creado----2020-07-12 06:50:03.0829509 -0300 -03 m=+2.351263701
*/
include_once(app_path().'\model\wf.php');

include_once(app_path().'\core\conexion.php');

class WfController_base extends Conexion{

	private $model; 

	public function __construct(){
		try {
			parent::__construct();
			$this->model = new Wf($this->pdo);
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


	public function create($id,$workflow,$idApp){


		$this->model->id=$id;
		$this->model->workflow=$workflow;
		$this->model->idApp=$idApp;

		return $this->model->create();
	}


	public function update($id,$workflow,$idApp){

		$this->model->id=$id;
		$this->model->workflow=$workflow;
		$this->model->idApp=$idApp;

		return $this->model->update();
	}
}

?>