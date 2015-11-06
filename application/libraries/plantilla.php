<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plantilla
 *
 * @author 5-09
 */
class plantilla 
{
    private $cabecera;
    private $enlaces;
    private $pie;
    private $fechahora;
    private $head;
    
    private $rutaImages;
    private $rutaJS;
    private $rutaCSS;

    public function __construct() 
    {
        date_default_timezone_set("America/Bogota");
        $this->fechahora = date("Y-m-d H:i:s");
        
        $this->rutaImages = base_url() . "assets/images";
        $this->rutaJS = base_url() . "assets/js";
        $this->rutaCSS = base_url() . "assets/css";
        
        $this->setHead();
        $this->setCabecera();
        $this->setEnlaces();
        $this->setPie();
        
    }
    
    public function __destruct() 
    {
        
    }
    
    public function getCabecera() {
        return $this->cabecera;
    }

    public function setCabecera($cabecera="") {
        $this->cabecera = "<h1>Administración de Sitios Web</h1>";
        $this->cabecera .= "<p>$this->fechahora</p>";
    }

    public function getEnlaces() {
        return $this->enlaces;
    }

    public function setEnlaces($enlaces="") {
        $this->enlaces = "<h3>Enlaces</h3>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/cInicio/index'>Inicio</a></p>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/cInicio/quienesSomos'>Quienes somos</a></p>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/cInicio/listarUsuarios'>Listar usuarios</a></p>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/cInicio/registrarUsuario'>Registrar usuario</a></p>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/Upload/index'>Subir imagen</a></p>";
        $this->enlaces .= "<p><a href='" . base_url() . "index.php/Upload/listarFotos'>Mostrar Galeria</a></p>";
    }

    public function getPie() {
        return $this->pie;
    }

    public function setPie($pie="") {
        $this->pie = "<p>SISTEMA USUARIOS</p>";
        $this->pie .= "<p>MEDELLÍN</p>";
        $this->pie .= "<p>2015 &reg;</p>";
        
    }

    public function getFechahora() {
        return $this->fechahora;
    }

    public function setFechahora($fechahora) {
        $this->fechahora = $fechahora;
    }

    public function getHead() {
        return $this->head;
    }

    public function setHead() {
        $this->head = "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
        $this->head .= "<title>Inicio</title>";
        $this->head .= "<link rel='stylesheet' type='text/css' href='" . $this->rutaCSS . "/styles.css'/>";
        $this->head .= "<link rel='stylesheet' type='text/css' href='". $this->rutaCSS . "/template.css'/>";
        $this->head .= "<script src='". $this->rutaJS ."/jquery-2.1.4.js'></script>";
        $this->head .= "<script src='". $this->rutaJS ."/functions.js'></script>";
    }



    
}

?>






