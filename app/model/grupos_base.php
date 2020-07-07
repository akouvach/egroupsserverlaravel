<?php

/*
----Creado----2020-07-07 09:18:39.0656451 -0300 -03 m=+0.267459401
*/
include_once(app_path().'\core\crud.php');;

class Grupos_base extends Crud {

	private $id;
	private $descripcion;
	private $grupo;
	private $idCreador;
	private $idOrganigrama;
	private $tipo;
	private $tags;

	const TABLE = 'grupos';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($descripcion,$grupo,$idCreador,$idOrganigrama,$tipo,$tags){
		try {
			$sql = 'insert into '.self::TABLE.' (descripcion,grupo,idCreador,idOrganigrama,tipo,tags) values(?,?,?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->descripcion,$this->grupo,$this->idCreador,$this->idOrganigrama,$this->tipo,$this->tags));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$descripcion,$grupo,$idCreador,$idOrganigrama,$tipo,$tags){
		try {
			$sql = 'update '.self::TABLE.' set  descripcion = ? , grupo = ? , idCreador = ? , idOrganigrama = ? , tipo = ? , tags = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->descripcion , $this->grupo , $this->idCreador , $this->idOrganigrama , $this->tipo , $this->tags , $this->id ));
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