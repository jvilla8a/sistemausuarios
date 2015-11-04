<?php
class Upload extends CI_Controller
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

		$this->load->model("mUsuarios");

		$this->head = $this->plantilla->getHead();
		$this->cabecera = $this->plantilla->getCabecera();
		$this->enlaces = $this->plantilla->getEnlaces();
		$this->pie = $this->plantilla->getPie();

	}

	public function index()
	{
		$usrs = $this->mUsuarios->listarUsuarios();
		$datos = array(
			'head' => $this->head,
			'cabecera' => $this->cabecera,
			'enlaces' => $this->enlaces,
			'contenido' => '',
			'pie' => $this->pie,
			'campos' => $usrs
			);
		$this->load->view("vSubirImagen",$datos);
	}

	public function do_upload()
	{
		$this->form_validation->set_rules("cboCampo", "Usuario", "required|min_length[3]|max_length[30]|trim");
		$this->form_validation->set_rules("txtTitulo", "Título", "required|min_length[3]|max_length[50]|trim");

		if($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = "./assets/uploads/";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_size'] = "2000";
			$config['max_width'] = "2024";
			$config['max_height'] = "2008";

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
				$contenido = $this->upload->display_errors();
			}
			else
			{
				$file_info = $this->upload->data();

				if($this->form_validation->run() == FALSE){
					$datos['contenido'] = "<h2>Registro de Usuario</h2>";
					$this->load->view("vRegistrarUsuario", $datos);
				}
				else{
					$registro = array(
						'foto' => $file_info['file_name'],
						'titulo' => $this->input->post("cboCampo"),
						'usr' => $this->input->post("txtUsuario")
						);
					$this->mUsuarios->insertarRegistro("album", $registro);
				}
				$this->_create_thumbnail($file_info['file_name']);
				$imagen = $file_info['file_name'];
				$contenido = "La imagen se cargó correctamente";

			}
			$datos = array(
				'head' => $this->head,
				'cabecera' => $this->cabecera,
				'enlaces' => $this->enlaces,
				'contenido' => $contenido,
				'pie' => $this->pie
				);
			$this->load->view("vSubirImagen",$datos);

		}
		else
		{
			$this->index();
		}
	}

	public function _create_thumbnail($filename){
		$config['image_library']='gd2';
		$config['source_image']="assets/uploads/$filename";
		$config['create_thumb']=TRUE;
		$config['maintain_ratio']=TRUE;
		$config['new_image']="assets/uploads/thumbs";
		$config['width']=150;
		$config['height']=150;
		$this->load->library("image_lib", $config);
		$this->image_lib->resize();
	}

	public function listarFotos(){
		$campo = $this->input->post("cboCampo");

		if(!empty($campo)){
			if($campo == "mostrartodos"){
				$contenido = $this->mUsuarios->listarFotos();
			}
			else{
				$contenido = $this->mUsuarios->buscarFotos($campo);
			}
		}
		else{
			$contenido = $this->mUsuarios->listarFotos();
		}
		$nreg = $contenido->num_rows();
		$usrs = $this->mUsuarios->listarUsuarios();
		$datos = array(
			'head' => $this->head,
			'cabecera' => $this->cabecera,
			'enlaces' => $this->enlaces,
			'contenido' => $contenido,
			'pie' => $this->pie,
			'nreg' => $nreg,
			'campos' => $usrs
		);
		$this->load->view("vGaleria",$datos);
	}
}
?>
