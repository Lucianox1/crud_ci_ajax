<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ctr_frutas extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model("M_frutas");
		
	}

	public function guardar(){
		$nombre = $this->input->post("nombre");
		$color = $this->input->post("color");
		$id = $this->input->post("idf");
		if (!empty($nombre) && !empty($color) && empty($id)) {
			$this->M_frutas->guardar($nombre,$color);
		}elseif (!empty($nombre) && !empty($color) && !empty($id)) {
			$this->M_frutas->modificar($id,$nombre,$color);
		}
	

		

		self::cargar_todo();
	}

	public function cargar_todo(){
		$resultado = $this->M_frutas->traer_todo();
		echo json_encode($resultado);

	}


	public function eliminar(){
		$id = $this->input->post("id");
		$this->M_frutas->eliminar($id);

	}
}

?>
