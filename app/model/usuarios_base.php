<?php

/*
----Creado----2020-07-07 09:18:39.3309412 -0300 -03 m=+0.532754701
*/
include_once(app_path().'\core\crud.php');;

class Usuarios_base extends Crud {

	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $usuario;
	private $genero;
	private $fecha_nac;
	private $pass;

	const TABLE = 'usuarios';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($nombre,$apellido,$email,$usuario,$genero,$fecha_nac,$pass){
		try {
			$sql = 'insert into '.self::TABLE.' (nombre,apellido,email,usuario,genero,fecha_nac,pass) values(?,?,?,?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->nombre,$this->apellido,$this->email,$this->usuario,$this->genero,$this->fecha_nac,$this->pass));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$nombre,$apellido,$email,$usuario,$genero,$fecha_nac,$pass){
		try {
			$sql = 'update '.self::TABLE.' set  nombre = ? , apellido = ? , email = ? , usuario = ? , genero = ? , fecha_nac = ? , pass = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->nombre , $this->apellido , $this->email , $this->usuario , $this->genero , $this->fecha_nac , $this->pass , $this->id ));
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