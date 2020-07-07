<?php

/*
----Creado----2020-07-07 09:18:39.0327318 -0300 -03 m=+0.234546201
*/
include_once(app_path().'\core\crud.php');;

class Geo_paises_base extends Crud {

	private $id;
	private $nombre;
	private $descripcion;
	private $iso3;
	private $codigo;

	const TABLE = 'geo_paises';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($id,$nombre,$descripcion,$iso3,$codigo){
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
	public function update($id,$nombre,$descripcion,$iso3,$codigo){
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