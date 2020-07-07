<?php

require_once "../core/crud.php";

class Grupo extends Crud {

    private $id;
    private $area;
    private $idAreaPadre;

    const TABLE = "organigramas";

    public function __construct(){
        parent::__construct(self::TABLE);
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }


    public function create(){
        try {

            $sql = "insert into ".self::TABLE." (area, idAreaPadre) values(?,?)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute(array($this->grupo, $this->descripcion, $this->idCreador, $this->idOrganigrama, $this->tipo, $this->tags));
            print_r($result);
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
          $sql = "update ".self::TABLE." set area=?, idAreaPadre=? where id = ?";
          $stmt = $this->pdo->prepare($sql);
          $result = $stmt->execute(array($this->grupo, $this->descripcion, $this->idCreador, $this->idOrganigrama, $this->tipo, $this->tags, $this->id));
          return $result;
        } catch (PDOException $err){
            throw $err;
        } catch (Error $err){
            throw $err;
        } catch (Exception $ex){
            throw $ex;
        }    }

}



?>
