<?php

/*
----Creado----2020-07-08 18:41:44.6665372 -0300 -03 m=+0.581584101
*/
include_once(app_path().'\model\grupos.php');

class GruposController_base {

	private $model; 

	public function __construct(){
		$this->model = new Grupos();
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


	public function create($descripcion,$grupo,$idCreador,$idOrganigrama,$tipo,$tags){


		$this->model->descripcion=$descripcion;
		$this->model->grupo=$grupo;
		$this->model->idCreador=$idCreador;
		$this->model->idOrganigrama=$idOrganigrama;
		$this->model->tipo=$tipo;
		$this->model->tags=$tags;

		return $this->model->create();
	}


	public function update($id,$descripcion,$grupo,$idCreador,$idOrganigrama,$tipo,$tags){

		$this->model->id=$id;
		$this->model->descripcion=$descripcion;
		$this->model->grupo=$grupo;
		$this->model->idCreador=$idCreador;
		$this->model->idOrganigrama=$idOrganigrama;
		$this->model->tipo=$tipo;
		$this->model->tags=$tags;

		return $this->model->update();
	}
}

?>