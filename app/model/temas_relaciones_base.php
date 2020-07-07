<?php

/*
----Creado----2020-07-07 09:18:39.3070172 -0300 -03 m=+0.508830801
*/
include_once(app_path().'\core\crud.php');;

class Temas_relaciones_base extends Crud {

	private $idTema;
	private $idTemaRel;

	const TABLE = 'temas_relaciones';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($idTema,$idTemaRel){
		try {
			$sql = 'insert into '.self::TABLE.' (idTema,idTemaRel) values(?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->idTema,$this->idTemaRel));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($idTema,$idTemaRel){
		try {
			$sql = 'update '.self::TABLE.' set where  idTema = ?  and  idTemaRel = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idTema , $this->idTemaRel ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim( $idTema ,  $idTemaRel){
		try {
			$sql = 'select * from '.self::TABLE.' where  idTema = ?  and  idTemaRel = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idTema ,  $this->idTemaRel));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim( $idTema ,  $idTemaRel){
		try {
			$sql = 'delete from '.self::TABLE.' where  idTema = ?  and  idTemaRel = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->idTema ,  $this->idTemaRel));
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