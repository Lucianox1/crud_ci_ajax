<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ctr_frutas extends CI_Controller
{
	function __construct(){
		parent::__construct();
	}

	public function guardar(){
		$nombre = $this->input->post("nombre");
		$color = $this->input->post("color");
		$this->load->model("M_frutas");
		$f = $this->M_frutas->guardar($nombre,$color);
	
	}
}

?>
