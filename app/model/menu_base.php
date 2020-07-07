<?php

/*
----Creado----2020-07-07 09:18:39.157421 -0300 -03 m=+0.359235101
*/
include_once(app_path().'\core\crud.php');;

class Menu_base extends Crud {

	private $id;
	private $ruta;
	private $menu;
	private $menuIdPadre;

	const TABLE = 'menu';

	public function __construct(){
		parent::__construct(self::TABLE);
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		$this->$name = $value;
	}

	public function create($ruta,$menu,$menuIdPadre){
		try {
			$sql = 'insert into '.self::TABLE.' (ruta,menu,menuIdPadre) values(?,?,?)';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array($this->ruta,$this->menu,$this->menuIdPadre));
			return $result;
		} catch (PDOException $err){
			throw $err;
		} catch (Error $err){
			throw $err;
		} catch (Exception $ex){
			throw $ex;
		}
	}
	public function update($id,$ruta,$menu,$menuIdPadre){
		try {
			$sql = 'update '.self::TABLE.' set  ruta = ? , menu = ? , menuIdPadre = ? where  id = ? ';
			$stmt = $this->pdo->prepare($sql);
			$result = $stmt->execute(array( $this->ruta , $this->menu , $this->menuIdPadre , $this->id ));
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