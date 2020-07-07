<?php

/*
----Creado----2020-07-07 09:18:39.2691014 -0300 -03 m=+0.470915101
*/
include_once(app_path().'\core\crud.php');;

class Temas_base extends Crud {

	private $id;
	private $tema;
	private $tipo;

	const TABLE = 'temas';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($tema,$tipo){
		try {
			$sql = 'insert into '.self::TABLE.' (tema,tipo) values(?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->tema,$this->tipo));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$tema,$tipo){
		try {
			$sql = 'update '.self::TABLE.' set  tema = ? , tipo = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->tema , $this->tipo , $this->id ));
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