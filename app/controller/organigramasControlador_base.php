<?php

/*
----Creado----2020-07-07 09:18:39.1833317 -0300 -03 m=+0.385145701
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
		return $this->model->getByPrim( $id);
	}

	public function delByPrim( $id){
		return $this->model->delByPrim( $id);
	}
}
?>