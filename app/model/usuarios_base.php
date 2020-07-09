<?php

/*
----Creado----2020-07-09 11:42:50.3545026 -0300 -03 m=+0.777186201
*/
include_once(app_path().'\core\crud.php');

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
			$sql = 'insert into '.self::TABLE.' (nombre,apellido,email,usuario,genero,fecha_nac,pass) values(?,?,?,?,?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->nombre,$this->apellido,$this->email,$this->usuario,$this->genero,$this->fecha_nac,$this->pass));
			$this->id = $this->pdo->lastInsertId();
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