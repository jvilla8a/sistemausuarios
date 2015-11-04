<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Descripción de cInicio
 *
 * @author 5-09
 * @fecha 
 * 
 */
class cInicio extends CI_Controller
{
    private $head;
    private $cabecera;
    private $enlaces;
    private $pie;
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->helper(array("form", "url"));
        $this->load->library(array('form_validation','plantilla'));
        
        $this->load->model("mPerfiles");
        $this->load->model("mUsuarios");
        
        $this->head = $this->plantilla->getHead();
        $this->cabecera = $this->plantilla->getCabecera();
        $this->enlaces = $this->plantilla->getEnlaces();
        $this->pie = $this->plantilla->getPie();
        
    }
    
    public function index()
    {
        $contenido = "<h2>Bienvenido</h2>
                      <p>Está en Inicio</p>
                     ";
        $datos = array(
            'head' => $this->head,
            'cabecera' => $this->cabecera,
            'enlaces' => $this->enlaces,
            'contenido' => $contenido,
            'pie' => $this->pie
        );
        $this->load->view("vInicio",$datos);
    }

    public function sesion(){
        $contenido = "  <h2>Iniciar Sesión</h2>
                         ";
        $datos = array(
                    'head' => $this->head,
                    'cabecera' => $this->cabecera,
                    'enlaces' => $this->enlaces,
                    'contenido' => $contenido,
                    'pie' => $this->pie,
                );
        $this->load->view("vSesion",$datos);
    }
    
    public function quienesSomos()
    {
        $contenido = "<h2>Quienes Somos</h2>
                      <p>Está en Quienes somos</p>
                     ";
        $datos = array(
            'head' => $this->head,
            'cabecera' => $this->cabecera,
            'enlaces' => $this->enlaces,
            'contenido' => $contenido,
            'pie' => $this->pie
        );
        $this->load->view("vQuienesSomos",$datos);
    }
    
    public function listarUsuarios()
    {
        $campo = $this->input->post("cboCampo");
        $dato = $this->input->post("txtDato");
        
        if(!empty($campo))
        {
            if($campo == "mostrartodos")
            {
                $contenido = $this->mUsuarios->listarUsuarios();   
            }
            else
            {
                $contenido = $this->mUsuarios->buscarUsuarios($campo, $dato); 
            }
        }
        else
        {
            $contenido = $this->mUsuarios->listarUsuarios();
        }
        //$nreg = $this->mUsuarios->totalRegistros('usuario');
        $nreg = $contenido->num_rows();
        $datos = array(
            'head' => $this->head,
            'cabecera' => $this->cabecera,
            'enlaces' => $this->enlaces,
            'contenido' => $contenido,
            'pie' => $this->pie,
            'nreg' => $nreg,
            'campos' => array('id','usuario','nombre','correo','idperfil')
        );
        $this->load->view("vListarUsuarios",$datos);
    }
    
    public function eliminarRegistro($id=0, $tabla="")
    {
        $this->mUsuarios->eliminarRegistro($tabla, $id);
        //redirect("/cInicio/listarUsuarios");
        $this->listarUsuarios();
    }
    
    public function modificarUsuario($id=0)
    {
        $contenido = $this->mUsuarios->consultarRegistro("usuario", "id", $id);
        if($contenido->num_rows()!=0)
        {
            $datos = array(
                'head' => $this->head,
                'cabecera' => $this->cabecera,
                'enlaces' => $this->enlaces,
                'contenido' => $contenido,
                'pie' => $this->pie
            );
            $this->load->view("vModificarUsuario", $datos);
        }
        else
        {
           $datos = array(
                'head' => $this->head,
                'cabecera' => $this->cabecera,
                'enlaces' => $this->enlaces,
                'contenido' => "<h3>No está autorizado</h3>",
                'pie' => $this->pie
            ); 
            
           $this->load->view("vAutorizacion", $datos);
        }
        
    }
    
    public function actualizarUsuario()
    {
        $this->form_validation->set_rules("txtNombre", "Nombre", "trim|required|min_length[3]");
        $this->form_validation->set_rules("txtCorreo", "Correo", "required|valid_email");
        
        $id = $this->input->post("txtId");
        
        if($this->form_validation->run() == FALSE)
        {
            $contenido = $this->mUsuarios->consultarRegistro("usuario", "id", $id);
            
            $datos = array(
                'head' => $this->head,
                'cabecera' => $this->cabecera,
                'enlaces' => $this->enlaces,
                'contenido' => $contenido,
                'pie' => $this->pie
            );
            $this->load->view("vModificarUsuario", $datos);
        }
        else
        {
            $registro = array(
                'nombre' => $this->input->post("txtNombre"),
                'correo' => $this->input->post("txtCorreo")
            );
            
            $this->mUsuarios->actualizarRegistro("usuario",$registro, $id);
            $this->listarUsuarios();
        }
    }
    
    public function registrarUsuario()
    {
        $queryPerfil = $this->mPerfiles->listarPerfiles();
        $datos = array(
                    'head' => $this->head,
                    'cabecera' => $this->cabecera,
                    'enlaces' => $this->enlaces,
                    'pie' => $this->pie,
                    'perfiles' => $queryPerfil
                );
        
        $query = $this->mUsuarios->consultarRegistro("usuario", "usuario", $this->input->post('txtUsuario'));
        
        if($query->num_rows() == 0)
        {
            $this->form_validation->set_rules("txtUsuario", "Usuario", "trim|required|min_length[3]");
            $this->form_validation->set_rules("txtNombre", "Nombre", "trim|required|min_length[3]");
            $this->form_validation->set_rules("txtCorreo", "Correo", "required|valid_email");
            $this->form_validation->set_rules('txtClave1', 'Contraseña', 'required|matches[txtClave2]');
            $this->form_validation->set_rules('txtClave2', 'Confirmar Contraseña', 'required');
            
            if($this->form_validation->run() == FALSE)
            {
                $datos['contenido'] = "<h2>Registro de Usuario</h2>";
                $this->load->view("vRegistrarUsuario", $datos);
            }
            else
            {
                $registro = array(
                    'usuario' => $this->input->post("txtUsuario"),  
                    'nombre' => $this->input->post("txtNombre"),  
                    'correo' => $this->input->post("txtCorreo"),  
                    'clave' => $this->input->post("txtClave1"),  
                    'idperfil' => $this->input->post("cboIdPerfil")  
                );

                $this->mUsuarios->insertarRegistro("usuario", $registro);
                $this->listarUsuarios();

                //$datos['contenido'] = "<h2>Registro guardado</h2>";
            }
        }
        else
        {
            $datos['contenido'] = "<h3>Este usuario ya está registrado en la base de datos</h3>";
            $this->load->view("vRegistrarUsuario", $datos);
        }
        
    }
    
    public function iniciarSesion(){
        $query = $this->mUsuarios->consultarSesion("usuario", "usuario", $this->input->post('txtUsuario'));
        
        if($query->num_rows() == 0)
        {
            $this->form_validation->set_rules("txtUsuario", "Usuario", "trim|required|min_length[3]");
            $this->form_validation->set_rules("txtNombre", "Nombre", "trim|required|min_length[3]");
            $this->form_validation->set_rules("txtCorreo", "Correo", "required|valid_email");
            $this->form_validation->set_rules('txtClave1', 'Contraseña', 'required|matches[txtClave2]');
            $this->form_validation->set_rules('txtClave2', 'Confirmar Contraseña', 'required');
            
            if($this->form_validation->run() == FALSE)
            {
                $datos['contenido'] = "<h2>Registro de Usuario</h2>";
                $this->load->view("vRegistrarUsuario", $datos);
            }
            else
            {
                $registro = array(
                    'usuario' => $this->input->post("txtUsuario"),  
                    'nombre' => $this->input->post("txtNombre"),  
                    'correo' => $this->input->post("txtCorreo"),  
                    'clave' => $this->input->post("txtClave1"),  
                    'idperfil' => $this->input->post("cboIdPerfil")  
                );

                $this->mUsuarios->insertarRegistro("usuario", $registro);
                $this->listarUsuarios();

                //$datos['contenido'] = "<h2>Registro guardado</h2>";
            }
        }
        else
        {
            $datos['contenido'] = "<h3>Este usuario ya está registrado en la base de datos</h3>";
            $this->load->view("vRegistrarUsuario", $datos);
        }
    }
}

?>
