<?php

/*
----Creado----2020-07-07 09:18:39.2052817 -0300 -03 m=+0.407095601
*/
include_once(app_path().'\model\sec_roles.php');

class Sec_rolesController_base {

	private $model; 

	public function __construct(){
		$this->model = new Sec_roles();
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