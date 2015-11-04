<?php

/**
 * Description of mPerfiles
 *
 * @author 5-09
 * @link http://localhost...
 * @example
 * @copyright
 */
class mPerfiles extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function __destruct() {
        
    }
    
    public function listarPerfiles()
    {
        $datos = array(
            '*'
        );
        $this->db->select($datos);
        $this->db->from('perfil');
        return $this->db->get();
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
