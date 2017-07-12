<?php

/**
 * @author Cesar A3
 * @copyright 2015
 */
class cls_Config{
    public $V_CONFIG=array();
    public function __construct(){
        $this->V_CONFIG['host']="localhost";
        $this->V_CONFIG['user']="";
        $this->V_CONFIG['password']="";
        $this->V_CONFIG['database']="test";
        $this->V_CONFIG['timezone']="america/bogota";
        $this->V_CONFIG['root_url']="http://localhost";
        $this->V_CONFIG['root_dir']="/pbapp/";
        $this->V_CONFIG['per_page']=10;
    }
    
	/**
	* Funcion para Destruir la Clase cuando no se use
	**/
	public function __destruct(){
	}
}


?>