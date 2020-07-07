<?php

include_once 'error_core.php';
include_once 'jwt_core.php';

function verificarSeguridad($key){
    
    $json = "";
   
    if($_SERVER['REQUEST_METHOD']=='POST') {

        $authToken = getallheaders()["Authorization"];
        $authToken = str_replace("Bearer ","",$authToken); 

        try {
            $auth = isAuthenticated($authToken, $key);
            if($auth->ok){
                //Tengo  código correctos.  Devuelvo los códigos de usuario               
                $json = (object)["ok"=>true,"errorcode"=>200,"payload"=>$auth];
            } else {
                $json = (object)["ok"=>false, "errorcode"=>401,"payload"=>"Token expirado. Vuelva a ingresar al sistema"];
            }
        } catch (Exception $ex){
            $json = (object)["ok"=>false,"errorcode"=>500,"payload"=>utf8_encode($ex->getMessage())];       
        } catch (Error $err){
            $json = (object)["ok"=>false,"errorcode"=>500,"payload"=> utf8_encode($err->getMessage())];
        }        
    } else {
        $json = (object)["ok"=>false,"errorcode"=>300,"payload"=> "Solo peticiones POST"];
    }
    return $json;
}

 
?>

