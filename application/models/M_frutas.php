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


	public function guardar($nombre, $color ,$id = null){
		$this->id=$id;
	    $this->color = $color;
	    $this->nombre = $nombre;
		$sql = "INSERT INTO frutas(nombre,color) Values ('".$this->nombre."','".$this->color."')";
		$this->db->query($sql);

	}

	public function traer_todo(){

		$query = $this->db->query('SELECT * FROM frutas');
		return $query->result();
	}

	public function modificar($id,$nombre,$color){
		$sql = "UPDATE frutas set nombre = '".$nombre."',color = '".$color."' WHERE id = ".$id;
		$this->db->query($sql);
	}

	public function eliminar($id){
		$sql = "DELETE FROM frutas WHERE id = ".$id;
		$this->db->query($sql);
	}

}


?>