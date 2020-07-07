<?php

/*
----Creado----2020-07-07 09:18:39.1813374 -0300 -03 m=+0.383151401
*/
include_once(app_path().'\core\crud.php');;

class Organigramas_base extends Crud {

	private $id;
	private $area;
	private $idAreaPadre;

	const TABLE = 'organigramas';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($area,$idAreaPadre){
		try {
			$sql = 'insert into '.self::TABLE.' (area,idAreaPadre) values(?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->area,$this->idAreaPadre));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$area,$idAreaPadre){
		try {
			$sql = 'update '.self::TABLE.' set  area = ? , idAreaPadre = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->area , $this->idAreaPadre , $this->id ));
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