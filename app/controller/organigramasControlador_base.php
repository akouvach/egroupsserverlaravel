<?php

/*
----Creado----2020-07-08 18:41:45.1937077 -0300 -03 m=+1.108754601
*/
include_once(app_path().'\model\organigramas.php');

class OrganigramasController_base {

	private $model; 

	public function __construct(){
		$this->model = new Organigramas();
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


	public function create($area,$idAreaPadre){


		$this->model->area=$area;
		$this->model->idAreaPadre=$idAreaPadre;

		return $this->model->create();
	}


	public function update($id,$area,$idAreaPadre){

		$this->model->id=$id;
		$this->model->area=$area;
		$this->model->idAreaPadre=$idAreaPadre;

		return $this->model->update();
	}
}

?>