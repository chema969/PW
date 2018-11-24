
<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 3/10/18
 * Time: 17:57
 */

class EmpresaConsultas
{
    public $usuario = 'i62cumuj';
    public $pass = '1234';
    public $conex;


    public function __construct()
    {

        $this->conex = $this->dbconnect();
    }


    public function dbconnect()
    {
        $nex = null;
        try {
            $nex = new PDO('mysql:host=oraclepr.uco.es;dbname=i62cumuj', $this->usuario, $this->pass, array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $except) {
            return null;
        }
        return $nex;
    }

    public function getdata()
    {
        $data = array();
        $sentence = $this->conex->prepare("select * from empleados order by id asc;");
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data[] = $row;
            }
        }
        return $data;
    }


    public function getTrabajador($datosEntrada)
    {
        $sentence = $this->conex->prepare("select * from empleados where id=" . $datosEntrada . ";");
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data = $row;
            }
        }
        return $data;
    }


    public function getMaxId()
    {
        $sentence = $this->conex->prepare("select max(id)id from empleados; ");
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data = $row;
            }
        }
        return $data["id"];
    }

    public function addUser(Empleado $empleado)
    {
        $sentence = $this->conex->prepare('insert into empleados(id,nombre,apellidos,dni,sueldo,correo, cargo)
     value(' . $empleado->getId() . ',"' . $empleado->getNombre() . '","' . $empleado->getApellidos() . '","' . $empleado->getDni() . '",' . $empleado->getSueldo() . ',"' . $empleado->getCorreo() . '","' . $empleado->getCargo() . '");');
        if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eraseUser($id)
    {
        $sentence = $this->conex->prepare("delete from empleados where id=" . $id);
        if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser(Empleado $empleado)
    {
        $sentence = $this->conex->prepare('UPDATE empleados
SET nombre = "' . $empleado->getNombre() . '", apellidos = "' . $empleado->getApellidos() . '",dni = "' . $empleado->getDni() . '",correo = "' . $empleado->getCorreo() . '",cargo = "' . $empleado->getCargo() . '"
WHERE id =' . $empleado->getId() . ';');
        if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function existeNombre($nombre){
        $data = 0;
        $sentence = $this->conex->prepare('select * from usuarios where usuario="'.$nombre .'";');
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data = $row;
            }
        }
        if(count($data)==1) return false;
        else return true;
    }
    public function getNombre($nombre){

        $sentence = $this->conex->prepare('select * from usuarios where usuario="'.$nombre .'";');
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                return $row;
            }
        }
         return false;

    }

    public function addNombre(Usuario $empleado)
    {
        $sentence = $this->conex->prepare('insert into usuarios(usuario,nombre,apellidos,password,correo, privilegios)
     value("' . $empleado->getUsuario() . '","' . $empleado->getNombre() . '","' . $empleado->getApellidos() . '","' . $empleado->getPassword() . '","' . $empleado->getCorreo() . '",' . $empleado->getPrivilegios() . ');');
              if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function iniciarSesion($nombre,$pass){
        $data=0;
        $sentence = $this->conex->prepare('select * from usuarios where usuario="'.$nombre .'";');
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data = $row;
            }
        }
        //password_verify($pass,$data["password"]);
        if(password_verify($pass,$data["password"])) return true;
        else return false;
    }
    public function getdataUsuarios(){
        $data = array();
        $sentence = $this->conex->prepare("select * from usuarios order by privilegios asc;");
        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function cambiarPrivilegios($nombre, $privilegios){
        $sentence = $this->conex->prepare('UPDATE usuarios set privilegios='.$privilegios .' where usuario="'.$nombre .'";');
        //echo 'UPDATE usuarios set privilegios='.$privilegios .' where usuario="'.$nombre .'";';
        if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addPeticion($id,$sueldonuevo,$sueldo,$usuario){
        $sentence = $this->conex->prepare('insert into peticionSueldo(nuevosueldo,viejosueldo,id,usuario) value ('.$sueldonuevo.','.$sueldo.','.$id.',"'.$usuario.'")');
        if ($sentence->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
