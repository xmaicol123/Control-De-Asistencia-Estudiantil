<?php
include_once('Conection.php');
class Estudiante extends Conexion
{
	//atributos
	private $cod_estudiante;
	/*private $nick;
	private $password_estudiante;*/
	private $nombre_estudiante;
	private $email;
	private $celular;
	private $fecha;
	private $direccion;

	//construtor
	public function Estudiante()
	{   parent::conexion();
		$this->cod_estudiante=0;
		/*$this->nick="";
		$this->password_estudiante="";*/
		$this->nombre_estudiante="";
		$this->email="";
		$this->celular="";
		$this->fecha="";
		$this->direccion="";	
	}
	//propiedades de acceso
	//PASSWORD DEL ESTUDIANTE
	public function setCodEstudiante($valor)
	{
		$this->cod_estudiante=$valor;
	}
	public function getCodEstudiante()
	{
		return $this->cod_estudiante;
	}
	//PASSWORD DEL ESTUDIANTE
	/*public function setNick($valor)
	{
		$this->nick=$valor;
	}
	public function getNick()
	{
		return $this->nick;
	}
	//PASSWORD DEL ESTUDIANTE
	public function setPassword($valor)
	{
		$this->password_estudiante=$valor;
	}
	public function getPassword()
	{
		return $this->password_estudiante;
	}*/
	//PASSWORD DEL NOMBRE
	public function setNombre($valor)
	{
		$this->nombre_estudiante=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_estudiante;
	}
	//PASSWORD DEL EMAIL
	public function setEmail($valor)
	{
		$this->email=$valor;
	}
	public function getEmail()
	{
		return $this->email;
	}
	//PASSWORD DEL CELULAR
	public function setCelular($valor)
	{
		$this->celular=$valor;
	}
	public function getCelular()
	{
		return $this->celular;
	}
	//PASSWORD DEL FECHA
	public function setFecha($valor)
	{
		$this->fecha=$valor;
	}
	public function getFecha()
	{
		return $this->fecha;
	}
	//PASSWORD DEL DIRECCION
	public function setDireccion($valor)
	{
		$this->direccion=$valor;
	}
	public function getDireccion()
	{
		return $this->direccion;
	}

	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO estudiante (nombre_estudiante,email,celular,fecha_nacimiento,direccion) VALUES('$this->nombre_estudiante','$this->email','$this->celular','$this->fecha','$this->direccion')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
	$sql="UPDATE estudiante SET nombre_estudiante='$this->nombre_estudiante', email='$this->email', celular='$this->celular', fecha_nacimiento='$this->fecha', direccion='$this->direccion' WHERE cod_estudiante=$this->cod_estudiante ";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql="DELETE FROM estudiante WHERE cod_estudiante=$this->cod_estudiante";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM estudiante";
		return parent::ejecutar($sql);
	}
    
}    
?>