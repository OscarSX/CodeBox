<?php 

class usuario{

	
	private $id_user;
	private $nombre;
	private $a_paterno;
	private $a_materno;
	private $email;
	private $password;
	private $nickname;

	public function getId_user()
	{
		return $this->id_user;
	}
	public function setId_user($id_user)
	{
		$this->id_usero = $id_user;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getA_paterno(){
		return $this->a_paterno;
	}

	public function setA_paterno($a_paterno){
		$this->a_paterno = $a_paterno;
	}

	public function getA_materno(){
		return $this->a_materno;
	}

	public function setA_materno($a_materno){
		$this->a_materno = $a_materno;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getNickname(){
		return $this->nickname;
	}

	public function setNickname($nickname){
		$this->nickname = $nickname;
	}


}
	
