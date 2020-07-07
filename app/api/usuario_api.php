<?php
include_once '../core/error_core.php';
include_once '../core/jwt_core.php';
include_once '../controller/usuario_controller.php';
include_once '../core/security.php';

$verificar = verificarSeguridad($key);

if(!$verificar->ok){
    http_response_code($verificar->errorcode);
    echo json_encode($verificar);
    exit();
}

include_once '../core/headers.php';

try {
    $usr = new UsuarioController;
    $result = $usr->getAll();
    $json = json_encode(["ok"=>true,"payload"=> $result]);
    // set response code
    http_response_code(200);    
} catch (Exception $ex){
    $json = json_encode(["ok"=>false,"payload"=>utf8_encode($ex->getMessage())]);       
    http_response_code(500);
} catch (Error $err){
    $json = json_encode(["ok"=>false,"payload"=> utf8_encode($ex->getMessage())]);
    http_response_code(500);
} finally {
    echo $json;
}
    
 
?>


