<?php
include_once("conexion.php");
include_once("roles_modelo.php");

class Usuario extends Conexion
{

    private $conexion;

    private $usuario;
    private $password;
    private $rol;
    private $habilitado;
    private const USER = "root";
    private const PASS = "";

    public function __construct()
    {
        $this->conexion = new Conexion(self::USER, self::PASS);
    }

    public static function getUsuarioLogin($login, $pass)
    {
        $usu = null;
        try {
            $user_db = null;
            $pass_db = null;
            $con = Conexion::getConexion($user_db, $pass_db);
            $consulta = "SELECT * FROM usuarios AS U
            INNER JOIN roles AS R ON U.id_rol = R.id_rol
            WHERE U.usuario = '$login' AND pass='$pass'";
            $res = $con->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
            if (count($res) > 0) {
                $usu = new Usuario();
                $usu->setUsuario($res[0]['usuario']);
                $usu->setHabilitado($res[0]['habilitado']);
                $rol = Rol::getRolPorID($res[0]['id_rol']);
                $usu->setRol($rol);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $usu;
    }




    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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



    public function getRol()
    {
        return $this->rol;
    }


    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}
