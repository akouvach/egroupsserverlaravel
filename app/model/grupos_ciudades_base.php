<?php

/*
----Creado----2020-07-07 09:18:39.0855908 -0300 -03 m=+0.287405101
*/
include_once(app_path().'\core\crud.php');;

class Grupos_ciudades_base extends Crud {

	private $idCiudad;
	private $idGrupo;
	private $fechaDesde;

	const TABLE = 'grupos_ciudades';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($idCiudad,$idGrupo,$fechaDesde){
		try {
			$sql = 'insert into '.self::TABLE.' (idCiudad,idGrupo,fechaDesde) values(?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->idCiudad,$this->idGrupo,$this->fechaDesde));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($idCiudad,$idGrupo,$fechaDesde){
		try {
			$sql = 'update '.self::TABLE.' set where  idCiudad = ?  and  idGrupo = ?  and  fechaDesde = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idCiudad , $this->idGrupo , $this->fechaDesde ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim( $idCiudad ,  $idGrupo ,  $fechaDesde){
		try {
			$sql = 'select * from '.self::TABLE.' where  idCiudad = ?  and  idGrupo = ?  and  fechaDesde = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idCiudad ,  $this->idGrupo ,  $this->fechaDesde));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim( $idCiudad ,  $idGrupo ,  $fechaDesde){
		try {
			$sql = 'delete from '.self::TABLE.' where  idCiudad = ?  and  idGrupo = ?  and  fechaDesde = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idCiudad ,  $this->idGrupo ,  $this->fechaDesde));
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