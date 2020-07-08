<?php

/*
----Creado----2020-07-08 18:41:45.06841 -0300 -03 m=+0.983456901
*/
include_once(app_path().'\model\menu.php');

class MenuController_base {

	private $model; 

	public function __construct(){
		$this->model = new Menu();
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


	public function create($ruta,$menu,$menuIdPadre){


		$this->model->ruta=$ruta;
		$this->model->menu=$menu;
		$this->model->menuIdPadre=$menuIdPadre;

		return $this->model->create();
	}


	public function update($id,$ruta,$menu,$menuIdPadre){

		$this->model->id=$id;
		$this->model->ruta=$ruta;
		$this->model->menu=$menu;
		$this->model->menuIdPadre=$menuIdPadre;

		return $this->model->update();
	}
}

?>