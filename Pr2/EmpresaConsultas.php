<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 3/10/18
 * Time: 17:57
 */

class EmpresaConsultas
{
 public $usuario='i62cumuj';
 public $pass='1234';
 public $conex;


 public function __construct(){

   $this ->conex = $this ->dbconnect();
}


public function dbconnect(){
       $nex=null;
       try{
         $nex= new PDO('mysql:host=oraclepr.uco.es;dbname=i62cumuj',$this ->usuario,$this->pass,array(PDO::ATTR_PERSISTENT=>true));
       }
       catch (PDOException $except){
           return null;
       }
 return $nex;
 }

 public function getdata(){
     $data=array();
     $sentence=$this->conex->prepare("select * from empleados order by id asc;" );
     if ($sentence->execute()){
         while ($row=$sentence->fetch()){ $data[]=$row;}
     }
     return $data;
 }


 public function getTrabajador($datosEntrada){
     $data=array();
     $sentence=$this->conex->prepare("select * from empleados where id=".$datosEntrada.";" );
     if ($sentence->execute()) {
         while ($row = $sentence->fetch()) {
             $data[] = $row;
         }
     }
     return $data;
 }

}