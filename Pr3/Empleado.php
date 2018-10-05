<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 4/10/18
 * Time: 17:28
 */

class Empleado
{
private $nombre;
private $apellidos;
private $dni;
private $id;
private $cargo;
private $sueldo=0;
private $correo;

public function __construct($nom="",$ap="",$dn="")
{
    $this->nombre=$nom;
    $this->apellidos=$ap;
    $this->dni=$dn;
}

public function getNombre(){
    return $this->nombre;
}

public function getApellidos(){
        return $this->apellidos;
}
public function getDni(){
        return $this->dni;
 }

public function getId(){
        return $this->id;
}

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @return mixed
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @param mixed $sueldo
     */
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }
    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function printEmpleado(){
        echo 'Nombre=' . $this->nombre . '<br>  Apellidos='.$this->apellidos . '<br>Dni=' . $this->dni . '<br>ID=' . $this->id .'<br>Cargp=' . $this->cargo .'<br>Sueldo=' . $this->sueldo .'<br>Correo=' . $this->correo;

    }
}