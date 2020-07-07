<?php

/*
----Creado----2020-07-07 09:18:39.2012859 -0300 -03 m=+0.403099801
*/
include_once(app_path().'\core\crud.php');;

class Sec_roles_base extends Crud {

	private $id;
	private $rol;
	private $esAdminGlogal;
	private $esAdminGrupo;
	private $esAdminGeografico;

	const TABLE = 'sec_roles';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($rol,$esAdminGlogal,$esAdminGrupo,$esAdminGeografico){
		try {
			$sql = 'insert into '.self::TABLE.' (rol,esAdminGlogal,esAdminGrupo,esAdminGeografico) values(?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->rol,$this->esAdminGlogal,$this->esAdminGrupo,$this->esAdminGeografico));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$rol,$esAdminGlogal,$esAdminGrupo,$esAdminGeografico){
		try {
			$sql = 'update '.self::TABLE.' set  rol = ? , esAdminGlogal = ? , esAdminGrupo = ? , esAdminGeografico = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->rol , $this->esAdminGlogal , $this->esAdminGrupo , $this->esAdminGeografico , $this->id ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim( $id){
		try {
			$sql = 'select * from '.self::TABLE.' where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->id));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim( $id){
		try {
			$sql = 'delete from '.self::TABLE.' where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->id));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
}
?>