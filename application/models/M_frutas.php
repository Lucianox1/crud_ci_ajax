<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_frutas extends CI_Model
{
	
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->database();

	}


	public function guardar($color, $nombre ,$id = null){
		$this->id=$id;
	    $this->color = $color;
	    $this->nombre = $nombre;
		$sql = "INSERT INTO frutas(nombre,color) Values ('".$this->nombre."','".$this->color."')";
		$this->db->query($sql);

	}

}


?>