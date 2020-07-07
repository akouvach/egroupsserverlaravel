<?php

/*
----Creado----2020-07-07 09:18:39.0696328 -0300 -03 m=+0.271447101
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
		return $this->model->getByPrim( $id);
	}

	public function delByPrim( $id){
		return $this->model->delByPrim( $id);
	}
}
?>