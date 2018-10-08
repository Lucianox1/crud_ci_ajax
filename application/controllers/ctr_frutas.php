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
		if (!empty($nombre) && !empty($color) ) {
			$f = $this->M_frutas->guardar($nombre,$color);
		}
		self::cargar_todo();
	}

	public function cargar_todo(){
		$resultado = $this->M_frutas->traer_todo();
		if(!empty($resultado)){
			echo json_encode($resultado);
		}else{
			echo "vacio";
		}
	}

	public function modificar(){
		$nombre = $this->input->post("nombre");
		$color = $this->input->post("color");
		$id = $this->input->post("id");
		$this->M_frutas->modificar($id,$nombre,$color);
		
		/*if($consulta = $this->M_frutas->modificar($id,$nombre,$color)){
			echo "objetivo modificado";
		}*/
	}
}

?>
