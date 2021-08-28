<?php
include_once("conexion.php");

class Rol extends Conexion
{

    private $conexion;

    private $rol;
    private $user_db;
    private $pass_db;
    private $habilitado;


    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public static function getRoles()
    {
        $resultado = null;
        try {

            $con = Conexion::getConexion($_SESSION['user_db'], $_SESSION['pass_db']);
            $consulta = "SELECT * FROM roles";
            $resultado = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $resultado;
    }

    public static function getRolPorID($id)
    {
        $rol = null;
        try {
            $con = new Conexion();
            $consulta = "SELECT * FROM roles  WHERE id_rol =" . $id;
            $res = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
            $rol = new Rol();
            $rol->setHabilitado($res[0]['habilitado']);
            $rol->setRol($res[0]['rol']);
            $rol->setUser_db($res[0]['user_db']);
            $rol->setPass_db($res[0]['pass_db']);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $rol;
    }

    public function getRol()
    {
        return $this->rol;
    }


    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }


    public function getUser_db()
    {
        return $this->user_db;
    }


    public function setUser_db($user_db)
    {
        $this->user_db = $user_db;

        return $this;
    }


    public function getPass_db()
    {
        return $this->pass_db;
    }


    public function setPass_db($pass_db)
    {
        $this->pass_db = $pass_db;

        return $this;
    }


    public function getHabilitado()
    {
        return $this->habilitado;
    }


    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }
}
