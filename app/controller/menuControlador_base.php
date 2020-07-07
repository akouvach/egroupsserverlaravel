<?php

/*
----Creado----2020-07-07 09:18:39.165391 -0300 -03 m=+0.367205001
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
		return $this->model->getByPrim( $id);
	}

	public function delByPrim( $id){
		return $this->model->delByPrim( $id);
	}
}
?>