<?php

/*
----Creado----2020-07-08 18:41:45.8388742 -0300 -03 m=+1.753921101
*/
include_once(app_path().'\model\temas_relaciones.php');

class Temas_relacionesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Temas_relaciones();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $idTema, $idTemaRel){

		$this->model->idTema= $idTema;,
		$this->model->idTemaRel= $idTemaRel;
		return $this->model->getByPrim();
	}

	public function delByPrim( $idTema, $idTemaRel){

		$this->model->idTema= $idTema;,
		$this->model->idTemaRel= $idTemaRel;
		return $this->model->delByPrim();
	}


	public function create($idTema,$idTemaRel){


		$this->model->idTema=$idTema;
		$this->model->idTemaRel=$idTemaRel;

		return $this->model->create();
	}


	public function update($idTema,$idTemaRel){

		$this->model->idTema=$idTema;
		$this->model->idTemaRel=$idTemaRel;

		return $this->model->update();
	}
}

?>