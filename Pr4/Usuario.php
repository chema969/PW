<?php
/**
 * Created by PhpStorm.
 * User: i62cumuj
 * Date: 12/11/18
 * Time: 8:53
 */

class Usuario
{
    private $usuario;
    private $password;
    private $nombre;
    private $apellidos;
    private $correo;
    private $privilegios;//0=usuario mundano, 1=privilegiado, 2=administrador
//mysql> create table usuarios (usuario varchar(255),nombre varchar(255), apellidos varchar(255),password varchar(255),telefono int(10),correo varchar(255),privilegios int(2));
    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }



    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getPrivilegios()
    {
        return $this->privilegios;
    }
    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash;
    }




    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $privilegios
     */
    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;
    }
}