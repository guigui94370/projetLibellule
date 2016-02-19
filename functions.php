<?php
	class Personne
	{
		private $_lastName;
    	private $_firstName;
    	private $_email;
    	private $_tel;
    	private $_password;
    	private $_validPassword;
    	private $_specialite;
    	private $_address;
    	private $_codePostal;
    	private $_city;
      	private $_displayEmail;

      	// public function __construct($lastName, $firstName, $email, $tel, $password, $validPassword, $specialite, $address, $codePostal, $city, $displayEmail) 
      	// {     
      	// 	echo 'Voici le constructeur !';
      	// 	$this->setLastName($lastName);
      	// 	$this->setFirstName($firstName);
      	// 	$this->setEmail($email);
      	// 	$this->setTel($tel);
      	// 	$this->setPassword($password);
      	// 	$this->setValidPassword($validPassword);
      	// 	$this->setSpecialite($specialite);
      	// 	$this->setAddress($address);
      	// 	$this->setCodePostal($codePostal);
      	// 	$this->setCity($city);
      	// 	$this->setDisplayEmail($displayEmail); 
      	// } 

      	// public function set_lastName($param){$this->_lastName=$param;}
		// public function set_lastName($param){$this->_lastName=$param;}
		// public function set_firstName($param){$this->_firstName=$param;}
		// public function set_email($param){$this->_email=$param;}
		// public function set_tel($param){$this->_tel=$param;}
		// public function set_password($param){$this->_password=$param;}
		// public function set_validPassword($param){$this->_validPassword=$param;}
		// public function set_specialite($param){$this->_specialite=$param;}
		// public function set_address($param){$this->_address=$param;}
		// public function set_codePostal($param){$this->_codePostal=$param;}
		// public function set_displayEmail($param){$this->_displayEmail=$param;}

		// public function get_lastName(){return $this->_lastName;}
		// public function get_firstName(){return $this->_firstName;}
		// public function get_email(){return $this->_email;}
		// public function get_tel(){return $this->_tel;}
		// public function get_password(){return $this->_password;}
		// public function get_validPassword(){return $this->_validPassword;}
		// public function get_specialite(){return $this->_specialite;}
		// public function get_address(){return $this->_address;}
		// public function get_codePostal(){return $this->_codePostal;}
		// public function get_displayEmail(){return $this->_displayEmail;}

		// public function afficherInfoPersonne() { 
		// 	// echo '<br />'.$this->_firstName.'<br />'.$this->_email.'<br />'.$this->_tel.'<br />'.$this->_password.'<br />'.$this->_validPassword.'<br />'.$this->_specialite.'<br />'.$this->_address.'<br />'.$this->_codePostal.'<br />'.$this->_city.'<br />'.$this->_displayEmail.'<br />';
		// 	echo "afficher ".$this->_firstName;
		// }
	}
?>