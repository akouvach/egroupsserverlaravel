<?php

require_once "usuarios_base.php";

class Usuarios extends Usuarios_base {

    public function getCredentials($email, $password){
        try {
            $sql = "select id, email, nombre, apellido, fecha_nac from ".self::TABLE." where email = ? and pass = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($email, $password));
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

}



?>
