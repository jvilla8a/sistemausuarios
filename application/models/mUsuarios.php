<?php

/**
 * Description of mUsuarios
 *
 * @author 5-09
 * @link http://localhost...
 * @example
 * @copyright
 */
class mUsuarios extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function __destruct() {

    }

    public function listarUsuarios()
    {
        $consulta = "SELECT
        u.id,
        u.usuario,
        u.nombre,
        u.correo,
        u.fechahoraregistro,
        p.descripcion AS perfil
        FROM perfil p INNER JOIN usuario u
        ON p.id = u.idperfil
        ";
        return $this->db->query($consulta);
    }

    public function listarFotos()
    {
        $consulta = "SELECT
        foto
        FROM album
        ";
        return $this->db->query($consulta);
    }

    public function buscarUsuarios($campo, $dato)
    {
        $datoConsulta = strtoupper($dato);
        $consulta = "SELECT
        u.id,
        u.usuario,
        u.nombre,
        u.correo,
        u.fechahoraregistro,
        p.descripcion AS perfil
        FROM perfil p INNER JOIN usuario u
        ON p.id = u.idperfil
        WHERE UPPER(u.$campo) LIKE '%$datoConsulta%'
        ";
        return $this->db->query($consulta);
    }

    public function listarUsuariosUsr(){
        $consulta = "SELECT
        usuario
        FROM usuario
        ";
        return $this->db->query($consulta);
    }

    public function buscarFotos($campo)
    {
        $consulta = "   SELECT foto
                                FROM album
                                WHERE usr LIKE '$campo'";
        return $this->db->query($consulta);
    }

    public function totalRegistros($tabla)
    {
        return $this->db->get($tabla)->num_rows();
    }

    public function eliminarRegistro($tabla, $dato)
    {
        $this->db->where('id', $dato);
        $this->db->delete($tabla);
    }

    public function consultarRegistro($tabla, $campo, $dato)
    {
        $this->db->where($campo, $dato);
        return $this->db->get($tabla);
    }

    public function actualizarRegistro($tabla, $registro, $id)
    {
        $this->db->where("id", $id);
        $this->db->update($tabla, $registro);
    }

    public function insertarRegistro($tabla, $registro)
    {
        $this->db->insert($tabla, $registro);
    }
}

?>
