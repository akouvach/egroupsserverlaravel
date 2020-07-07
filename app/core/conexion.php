
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

    public function crearModelo($nombreBD)
    {

        $rta = $this->crearBD($nombreBD);
        if(empty($rta))
        {
            // todo bien voy a conectarme con esta base de datos y crear las tablas
            $this->dbName = $nombreBD;
            try {
                $conn = $this->conex();
              
                // sql to create table
                $sql = "CREATE TABLE MyGuests (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
              
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "Table MyGuests created successfully";


                $sql = "CREATE TABLE MyGuests2 (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(30) NOT NULL,
                    lastname VARCHAR(30) NOT NULL,
                    email VARCHAR(50),
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
                  
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Table MyGuests2 created successfully";
    
                    
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;


        } else {
            return $rta;
        }

    }

    private function crearBD($nombre)
    {

        try {
            $conn = new PDO("mysql:host=".$this->host, $this->user, $this->pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DROP DATABASE ".$nombre;
            try {
                $conn->exec($sql);
            } catch (PDOException $ex) {
                error_log($ex->getMessage(),0);
            }

            $sql = "CREATE DATABASE ".$nombre;
            $conn->exec($sql);

        } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
        return "";

    }


}
?>
