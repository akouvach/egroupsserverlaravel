<?php

/*
----Creado----2020-07-09 11:42:49.7720697 -0300 -03 m=+0.194753301
*/
include_once(app_path().'\core\crud.php');

class Geo_paises_base extends Crud {

	private $id;
	private $nombre;
	private $descripcion;
	private $iso3;
	private $codigo;

	const TABLE = 'geo_paises';

	public function __construct($pdo){
		parent::__construct($pdo, self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create(){


		try {
			$sql = 'insert into '.self::TABLE.' (id,nombre,descripcion,iso3,codigo) values(?,?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->id,$this->nombre,$this->descripcion,$this->iso3,$this->codigo));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update(){
		try {
			$sql = 'update '.self::TABLE.' set  nombre = ? , descripcion = ? , iso3 = ? , codigo = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->nombre , $this->descripcion , $this->iso3 , $this->codigo , $this->id ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim(){
		try {
			$sql = 'select * from '.self::TABLE.' where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->id));
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim(){
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