<?php

/**
 * @filesource cls_TBLPhoneBook.php
 * @name Class for Manage Table Phone Book
 * @version 1.0
 * @since Agosto / 2015
 * @author Cesar Augusto Andrade - ALT
 * @copyright 2015
 */

include_once("cls_ManejoDB.php");

class cls_TBLPhoneBook extends cls_Config{
    private $V_NAME;
    private $V_PHONE;
    private $V_DATE_ADD;
    private $V_NOTES;
    private $V_STR_SERVER;
    private $V_STR_DBUSER;
    private $V_STR_DBPWD;
    private $V_STR_DATABASE;
    private $V_OBJ_DATOS;
    private $V_CONEXION;
    
    public function __construct($P_NAME,$P_PHONE,$P_DATE_ADD,$P_NOTES){
        $OBJ_CONFIG=new cls_Config();
        $this->V_STR_SERVER=$OBJ_CONFIG->V_CONFIG['host'];
        $this->V_STR_DBUSER=$OBJ_CONFIG->V_CONFIG['user'];
        $this->V_STR_DBPWD=$OBJ_CONFIG->V_CONFIG['password'];
        $this->V_STR_DATABASE=$OBJ_CONFIG->V_CONFIG['database'];
        $this->V_NAME=$P_NAME;
        $this->V_PHONE=$P_PHONE;
        $this->V_DATE_ADD=$P_DATE_ADD;
        $this->V_NOTES=$P_NOTES;
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

    public function fset_name(){
        return($this->V_NAME);
    }

    public function fset_phone(){
        return($this->V_PHONE);
    }

    public function fset_dateadd(){
        return($this->V_DATE_ADD);
    }

    public function fset_addnotes(){
        return($this->V_NOTES);
    }
    
    public function read_phones($P_SQL){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_ID_LEETODO=$V_OBJ_DATOS->Busquedas($P_SQL,$this->V_CONEXION);
        while ($V_ROW=mysql_fetch_assoc($V_ID_LEETODO)){
            $V_ARR_DATA[]=$V_ROW;
        }
        if (!empty($V_ARR_DATA))
            {
            return($V_ARR_DATA);
            }
    }
    
    public function phone_count(){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_SQL="SELECT COUNT(*) AS CANTIDAD_REGS from phonebook";
        $V_ID_COUNT=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        $V_NUM_RECS=0;
        if ($V_ARR_DATO=$V_OBJ_DATOS->ArregloDatos($V_ID_COUNT))
            {
            $V_NUM_RECS=$V_ARR_DATO['CANTIDAD_REGS'];
            }
        $V_OBJ_DATOS->LiberarBusqueda($V_ID_COUNT);
        return($V_NUM_RECS);
    }
    
    public function search_phone(){
        $V_SW_EXISTE=FALSE;
        $V_STR_SQL="SELECT * FROM phonebook pb WHERE pb.phone=".$this->V_PHONE;
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_ID_BUSQUEDA=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        if ($V_ARR_DATO=$V_OBJ_DATOS->ArregloDatos($V_ID_BUSQUEDA))
            {
            $this->V_NAME=$V_ARR_DATO['name'];
            $this->V_PHONE=$V_ARR_DATO['phone'];
            $this->V_DATE_ADD=$V_ARR_DATO['date_add'];
            $this->V_NOTES=$V_ARR_DATO['add_notes'];
            $V_SW_EXISTE=TRUE;
            }
        $V_OBJ_DATOS->LiberarBusqueda($V_ID_BUSQUEDA);
        return($V_SW_EXISTE);
    }
        
    public function save_phonebook(){
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_SW_EXISTE=$this->search_phone();
        $V_NUM_STATREC=0;
        if ($V_SW_EXISTE==TRUE)
            {
            // The Record Already Exists
            $V_NUM_STATREC=2;
            }
        else
            {
            $V_STR_SQL="INSERT INTO phonebook VALUES ('".addslashes($this->V_NAME)."',".$this->V_PHONE.",'".$this->V_DATE_ADD."','".addslashes($this->V_NOTES)."')";
            $V_ID_SAVE=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
            if ($V_ID_SAVE==TRUE)
                {
                $V_NUM_STATREC=1;
                }
            else
                {
                $V_NUM_STATREC=0;
                }
            }
        return($V_NUM_STATREC);
    }
    
    public function update_phonebook(){
        $V_NUM_STATREC=0;
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_SQL="UPDATE phonebook pb SET pb.name='".addslashes($this->V_NAME)."',pb.date_add='".$this->V_DATE_ADD."',pb.add_notes='".addslashes($this->V_NOTES)."' WHERE pb.phone=".$this->V_PHONE;
        $V_ID_UPDATE=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        if ($V_ID_UPDATE==TRUE)
            {
            $V_NUM_STATREC=1;
            }
        else
            {
            $V_NUM_STATREC=0;
            }
        return($V_NUM_STATREC);
    }
    
    public function delete_phonebook(){
        $V_NUM_STATREC=0;
        $V_OBJ_DATOS=new cls_ManejoDatos();
        $V_STR_SQL="DELETE FROM phonebook WHERE phonebook.phone=".$this->V_PHONE;
        $V_ID_DELETE=$V_OBJ_DATOS->Busquedas($V_STR_SQL,$this->V_CONEXION);
        if ($V_ID_DELETE==TRUE)
            {
            $V_NUM_STATREC=1;
            }
        else
            {
            $V_NUM_STATREC=0;
            }
        return($V_NUM_STATREC);
    }
}
?>