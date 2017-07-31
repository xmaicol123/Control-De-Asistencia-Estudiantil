<?php
include_once('Conection.php');
Class Login extends Conexion
{
	//declarando las atributos
	private $usuario;
	private $password;

	//constructor
	public function Login()
	{
		parent::conexion();
		$this->usuario="";
		$this->password="";
	}

	//METODOS
	public function setUsuario($valor)
	{
		$this->usuario=$valor;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setPassword($valor)
	{
		$this->password=$valor;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function loginAdmin()
	{
		$sql="SELECT * FROM admin WHERE usuario_admin='$this->usuario' and password_admin = md5('$this->password')";
		return parent::ejecutar($sql);
	}

	public function loginProfesor()
	{
		$sql="SELECT * FROM profesor WHERE nick_profesor='$this->usuario' AND password_profesor=md5('$this->password')";
		return parent::ejecutar($sql);
	}

	public function loginEstudiante()
	{
		$sql="SELECT * FROM estudiante WHERE nick_estudiante = '$this->usuario' AND password_estudiante = md5('$this->password')";
		return parent::ejecutar($sql);
	}

} 
?>