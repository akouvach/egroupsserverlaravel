<?php

require_once "gruposControlador_base.php"; 
require_once "organigramasController.php"; 

class GruposController extends GruposController_base {

    public function create($descripcion,$grupo,$idCreador,$idOrganigrama,$tipo,$tags){
        
        try {
            $org = new OrganigramasController($this->pdo);

            if(!$this->beginTrans()){
                throw new Exception("fallo al iniciar la transaccion");
            };

            $org->create("Principal",null);

            $res = parent::create($descripcion,$grupo,$idCreador,$org->model->id,$tipo,$tags);
            
            if(!$this->commitTrans()){
                throw new Exception("Fallo al confirmar la transaccion");
            }
                
            return $res;
        } catch (Exception $ex){
            $this->rollbackTrans();
			throw $ex;
		}
        
	}


}

?>
