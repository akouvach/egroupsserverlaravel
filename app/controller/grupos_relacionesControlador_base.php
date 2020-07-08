<?php

/*
----Creado----2020-07-08 18:41:44.9272905 -0300 -03 m=+0.842337401
*/
include_once(app_path().'\model\grupos_relaciones.php');

class Grupos_relacionesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Grupos_relaciones();
	}

	public function getAll(){
		return $this->model->getAll();
	}

	public function getByPrim( $grupo_origen, $grupo_destino){

		$this->model->grupo_origen= $grupo_origen;,
		$this->model->grupo_destino= $grupo_destino;
		return $this->model->getByPrim();
	}

	public function delByPrim( $grupo_origen, $grupo_destino){

		$this->model->grupo_origen= $grupo_origen;,
		$this->model->grupo_destino= $grupo_destino;
		return $this->model->delByPrim();
	}


	public function create($grupo_origen,$grupo_destino,$tipo_relacion,$fechaDesde){


		$this->model->grupo_origen=$grupo_origen;
		$this->model->grupo_destino=$grupo_destino;
		$this->model->tipo_relacion=$tipo_relacion;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->create();
	}


	public function update($grupo_origen,$grupo_destino,$tipo_relacion,$fechaDesde){

		$this->model->grupo_origen=$grupo_origen;
		$this->model->grupo_destino=$grupo_destino;
		$this->model->tipo_relacion=$tipo_relacion;
		$this->model->fechaDesde=$fechaDesde;

		return $this->model->update();
	}
}

?>