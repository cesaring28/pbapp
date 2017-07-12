<?php

/**
 * @filesource cls_TBLUsers.php
 * @name Class for Manage Table users
 * @version 1.0
 * @since Agosto / 2015
 * @author Cesar Augusto Andrade - ALT
 * @copyright 2015
 */

include_once("cls_ManejoDB.php");

class cls_TBLUsers extends cls_Config{
    private $V_NAME_USER;
    private $V_EMAIL_USER;
    private $V_PWD_USER;
    private $V_STR_SERVER;
    private $V_STR_DBUSER;
    private $V_STR_DBPWD;
    private $V_STR_DATABASE;
    private $V_OBJ_DATOS;
    private $V_CONEXION;
    
    public function __construct($P_NAME_USER,$P_EMAIL_USER,$P_PWD_USER){
        $OBJ_CONFIG=new cls_Config();
        $this->V_STR_SERVER=$OBJ_CONFIG->V_CONFIG['host'];
        $this->V_STR_DBUSER=$OBJ_CONFIG->V_CONFIG['user'];
        $this->V_STR_DBPWD=$OBJ_CONFIG->V_CONFIG['password'];
        $this->V_STR_DATABASE=$OBJ_CONFIG->V_CONFIG['database'];
        $this->V_NAME_USER=$P_NAME_USER;
        $this->V_EMAIL_USER=$P_EMAIL_USER;
        $this->V_PWD_USER=$P_PWD_USER;
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $this->V_CONEXION=$V_OBJ_DATOS->OpenConection($this->V_STR_SERVER,$this->V_STR_DBUSER,$this->V_STR_DBPWD,$this->V_STR_DATABASE);
    }
    
	/**
	* Funcion para Destruir la Clase cuando no se use
	**/
	public function __destruct(){
       $V_OBJ_DATOS=new cls_ManejoDatos();
	   $V_OBJ_DATOS->CerrarConexion($this->V_CONEXION);
	}

    public function fset_nameuser(){
        return($this->V_NAME_USER);
    }

    public function fset_emailuser(){
        return($this->V_EMAIL_USER);
    }

    public function fset_pwduser(){
        return($this->V_PWD_USER);
    }

    public function search_user(){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_SW_EXISTE=FALSE;
        $V_STR_SQL="SELECT * FROM users usr WHERE usr.user_email='".$this->V_EMAIL_USER."'";
        $V_ID_BUSQUEDA=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        if ($V_ARR_DATO=$V_OBJ_DATOS->ArregloDatos($V_ID_BUSQUEDA))
            {
            $this->V_NAME_USER=$V_ARR_DATO['user_name'];
            $this->V_EMAIL_USER=$V_ARR_DATO['user_email'];
            $this->V_PWD_USER=$V_ARR_DATO['user_paswd'];
            $V_SW_EXISTE=TRUE;
            }
        $V_OBJ_DATOS->LiberarBusqueda($V_ID_BUSQUEDA);
        return($V_SW_EXISTE);
    }
    
    public function login_user(){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_PASWD=md5(addslashes($this->V_PWD_USER));
        $V_STR_SQL="SELECT * FROM users usr WHERE usr.user_email='".$this->V_EMAIL_USER."' AND usr.user_paswd='$V_STR_PASWD'";
        $V_ID_BUSQUEDA=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        $V_NUM_ROWS=$V_OBJ_DATOS->NroRegsSQL($V_ID_BUSQUEDA);
        if ($V_NUM_ROWS==1)
            {
            $V_ARR_DATO=$V_OBJ_DATOS->ArregloDatos($V_ID_BUSQUEDA);
            $this->V_NAME_USER=$V_ARR_DATO['user_name'];
            $this->V_EMAIL_USER=$V_ARR_DATO['user_email'];
            $this->V_PWD_USER=$V_ARR_DATO['user_paswd'];            
            }
        return($V_NUM_ROWS);

    }
    
    public function save_user(){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_SQL="INSERT INTO users VALUES ('".$this->V_NAME_USER."','".$this->V_EMAIL_USER."',MD5('".$this->V_PWD_USER."'))";
        $V_OBJ_DATOS->EjecutarSQL($V_STR_SQL,$this->V_CONEXION);
    }
    
    public function pwd_user($V_STR_PWD){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_SQL="SELECT MD5('$V_STR_PWD') AS PWD_DB";
        $V_ID_BUSQUEDA=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        if ($V_ARR_DATO=$V_OBJ_DATOS->ArregloDatos($V_ID_BUSQUEDA))
            {
            $V_STR_PWDDB=$V_ARR_DATO['PWD_DB'];
            $V_OBJ_DATOS->LiberarBusqueda($V_ID_BUSQUEDA);
            return($V_STR_PWDDB);
            }
        else
            {
            $V_OBJ_DATOS->LiberarBusqueda($V_ID_BUSQUEDA);
            return(null);
            }
    }
}

?>