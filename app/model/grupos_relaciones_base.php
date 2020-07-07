<?php

/*
----Creado----2020-07-07 09:18:39.1175052 -0300 -03 m=+0.319319401
*/
include_once(app_path().'\core\crud.php');;

class Grupos_relaciones_base extends Crud {

	private $grupo_origen;
	private $grupo_destino;
	private $tipo_relacion;
	private $fechaDesde;

	const TABLE = 'grupos_relaciones';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($grupo_origen,$grupo_destino,$tipo_relacion,$fechaDesde){
		try {
			$sql = 'insert into '.self::TABLE.' (grupo_origen,grupo_destino,tipo_relacion,fechaDesde) values(?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->grupo_origen,$this->grupo_destino,$this->tipo_relacion,$this->fechaDesde));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($grupo_origen,$grupo_destino,$tipo_relacion,$fechaDesde){
		try {
			$sql = 'update '.self::TABLE.' set  tipo_relacion = ? , fechaDesde = ? where  grupo_origen = ?  and  grupo_destino = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->tipo_relacion , $this->fechaDesde , $this->grupo_origen , $this->grupo_destino ));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function getByPrim( $grupo_origen ,  $grupo_destino){
		try {
			$sql = 'select * from '.self::TABLE.' where  grupo_origen = ?  and  grupo_destino = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->grupo_origen ,  $this->grupo_destino));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function delByPrim( $grupo_origen ,  $grupo_destino){
		try {
			$sql = 'delete from '.self::TABLE.' where  grupo_origen = ?  and  grupo_destino = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->grupo_origen ,  $this->grupo_destino));
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