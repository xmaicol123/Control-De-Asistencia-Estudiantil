<?php
include_once('Conection.php');
class Docente extends Conexion
{
	//atributos
	private $cod_profesor;
	private $nombre_profesor;
	private $nick;
	private $password_profesor;
	private $direccion;
	private $email;
	private $celular;
	

	//construtor
	public function Docente()
	{   parent::conexion();
		$this->cod_profesor=0;
		$this->nombre_profesor="";
		$this->nick="";
		$this->password_profesor="";
		$this->direccion="";
		$this->email="";
		$this->celular="";	
	}
	//propiedades de acceso
	//CODIGO DE DOCENTE
	public function setCodDocente($valor)
	{
		$this->cod_profesor=$valor;
	}
	public function getCodDocente()
	{
		return $this->cod_profesor;
	}
	//NOMBRE DE DOCENTE
	public function setNombre($valor)
	{
		$this->nombre_profesor=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_profesor;
	}
	//NOMBRE DE nick
	public function setNick($valor)
	{
		$this->nick=$valor;
	}
	public function getNick()
	{
		return $this->nick;
	}
	//NOMBRE DE PASSWORD
	public function setPassword($valor)
	{
		$this->password_profesor=$valor;
	}
	public function getPassword()
	{
		return $this->password_profesor;
	}
	//NOMBRE DE DIRECCION
	public function setDireccion($valor)
	{
		$this->direccion=$valor;
	}
	public function getDireccion()
	{
		return $this->direccion;
	}
	//NOMBRE DE EMAIL
	public function setEmail($valor)
	{
		$this->email=$valor;
	}
	public function getEmail()
	{
		return $this->email;
	}
	//NOMBRE DE CELULAR
	public function setCelular($valor)
	{
		$this->celular=$valor;
	}
	public function getCelular()
	{
		return $this->celular;
	}

	

	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO profesor (nick_profesor,password_profesor,nombre_profesor,direccion,email,celular) VALUES('$this->nick','$this->password_profesor','$this->nombre_profesor','$this->direccion','$this->email','$this->celular')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
	$sql="UPDATE profesor SET nick_profesor='$this->nick', password_profesor='$this->password_profesor', nombre_profesor='$this->nombre_profesor', direccion='$this->direccion', email='$this->email', celular='$this->celular' WHERE cod_profesor=$this->cod_profesor";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql="DELETE FROM profesor WHERE cod_profesor=$this->cod_profesor";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	//consulta para hacer llamado tambien
	public function buscar()
	{
		$sql="SELECT * FROM profesor";
		return parent::ejecutar($sql);
	}
}    
?>