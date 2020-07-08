<?php

/*
----Creado----2020-07-08 18:41:45.3268113 -0300 -03 m=+1.241858201
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

		$this->model->id= $id;
		return $this->model->getByPrim();
	}

	public function delByPrim( $id){

		$this->model->id= $id;
		return $this->model->delByPrim();
	}


	public function create($rol,$esAdminGlogal,$esAdminGrupo,$esAdminGeografico){


		$this->model->rol=$rol;
		$this->model->esAdminGlogal=$esAdminGlogal;
		$this->model->esAdminGrupo=$esAdminGrupo;
		$this->model->esAdminGeografico=$esAdminGeografico;

		return $this->model->create();
	}


	public function update($id,$rol,$esAdminGlogal,$esAdminGrupo,$esAdminGeografico){

		$this->model->id=$id;
		$this->model->rol=$rol;
		$this->model->esAdminGlogal=$esAdminGlogal;
		$this->model->esAdminGrupo=$esAdminGrupo;
		$this->model->esAdminGeografico=$esAdminGeografico;

		return $this->model->update();
	}
}

?>