<?php

/*
----Creado----2020-07-07 09:18:39.219234 -0300 -03 m=+0.421047901
*/
include_once(app_path().'\core\crud.php');;

class Sec_roles_permisos_base extends Crud {

	private $idRol;
	private $idMenu;
	private $fechaDesde;

	const TABLE = 'sec_roles_permisos';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($idRol,$idMenu,$fechaDesde){
		try {
			$sql = 'insert into '.self::TABLE.' (idRol,idMenu,fechaDesde) values(?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->idRol,$this->idMenu,$this->fechaDesde));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($idRol,$idMenu,$fechaDesde){
		try {
			$sql = 'update '.self::TABLE.' set  fechaDesde = ? where  idRol = ?  and  idMenu = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->fechaDesde , $this->idRol , $this->idMenu ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim( $idRol ,  $idMenu){
		try {
			$sql = 'select * from '.self::TABLE.' where  idRol = ?  and  idMenu = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idRol ,  $this->idMenu));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim( $idRol ,  $idMenu){
		try {
			$sql = 'delete from '.self::TABLE.' where  idRol = ?  and  idMenu = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idRol ,  $this->idMenu));
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