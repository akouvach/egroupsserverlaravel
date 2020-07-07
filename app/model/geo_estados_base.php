<?php

/*
----Creado----2020-07-07 09:18:38.9838645 -0300 -03 m=+0.185679101
*/
include_once(app_path().'\core\crud.php');;

class Geo_estados_base extends Crud {

	private $id;
	private $estado;
	private $idPais;

	const TABLE = 'geo_estados';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($estado,$idPais){
		try {
			$sql = 'insert into '.self::TABLE.' (estado,idPais) values(?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->estado,$this->idPais));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$estado,$idPais){
		try {
			$sql = 'update '.self::TABLE.' set  estado = ? , idPais = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->estado , $this->idPais , $this->id ));
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