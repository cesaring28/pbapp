<?php
/**
 * @filesource cls_ManejoDB.php
 * @name Clase de Manejo de Base de datos MVC para Tablas Basicas
 * @version 1.0
 * @since Agosto 02 / 2015
 * @author Cesar Augusto Andrade - ALT
 * @copyright 2015
 */

class cls_ManejoDatos{

	private $V_CONEXION;
   
    /**
    * Funcion Inicial de Asignacion de Parametros a la Base de Datos
    **/
	public function __construct(){
	}
	
	/**
	* Funcion para Destruir la Clase cuando no se use
	**/
	public function __destruct(){
	}

    /**
     * 
     **/
    public function OpenConection($P_SERVER,$P_USER,$P_PASWD,$P_DATABASE){
		$this->V_CONEXION=mysql_connect($P_SERVER,$P_USER,$P_PASWD) or die("Error Connecting to DataBase ".mysql_error());
		mysql_select_db($P_DATABASE,$this->V_CONEXION);
        return($this->V_CONEXION);
    }
    
    /**
    * Funcion para Asignacion del SQL de Busquedas
    **/
	public function Busquedas($P_SQL,$P_IDCONEX){
		$V_RESULTADO=mysql_query($P_SQL,$P_IDCONEX);
		return($V_RESULTADO);
	}
	
	/**
	* Funcion Para Liberar las Consultas Ejecutadas
	**/
	public function LiberarBusqueda($P_IDSQL){
		mysql_free_result($P_IDSQL);
	}
	
	/**
	* Funcion Conversion de Datos Leidos en Arreglo
	**/
	public function ArregloDatos($P_DATOS){
		$V_ARRDATA=mysql_fetch_array($P_DATOS);
		return($V_ARRDATA);
	}

    /**
    * Funcion para Ejecutar SQL
    **/	
    public function EjecutarSQL($P_SQL,$P_IDCONEX){
  	 mysql_query($P_SQL, $P_IDCONEX);
    }
 
    /**
     * Funcion que retorna cantidad de Registros Leidos
     **/
    public function NroRegsSQL($P_ID_SQL){
        $V_NUM_ROWS=mysql_num_rows($P_ID_SQL);
        if (is_null($V_NUM_ROWS))
            $V_NUM_ROWS=0;
        return($V_NUM_ROWS);
    }
 	/**
 	* Funcion para Cerrar la Conexion a la Base de Datos
 	**/ 
 	public function CerrarConexion($P_IDCONEX){
		mysql_close($P_IDCONEX);
 	}
}
?>