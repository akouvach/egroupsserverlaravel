
<?php

class Conexion {

    // Local 
    private $driver = "mysql";
    private $host = "localhost";
    private $port = 3306;
    private $user = "root";
    private $pass = "";
    private $dbName =  "participemos";
    private $charset = "utf8";

   
    protected function conex(){

        try {
            $pdo = new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbName};charset={$this->charset}",$this->user,$this->pass);

            if($pdo){
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              return $pdo;
            } else {
                throw new Exception("error en la conexion la creación de la conexión");
            }

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
