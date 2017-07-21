<?php

class Computer {
	//private $userName;
	private $IPaddress;
	private $hostName;
	private $application = array();
	private $cable = 'null';
	public function __construct($IP, $hostname){
		//$this->userName = $name;
		$this->IPaddress = $IP;
		$this->hostName = $hostname;
		//$this->application = "null";
		//echo  "Computer '".$this->userName."' with hostname '".$this->hostName."' and IP address '".$this->IPaddress."' is created!!";
	}

	// public function getUserName(){
	// 	return $this->userName;
	// }

	public function getIP(){
		return $this->IPaddress;
	}

	public function getHost(){
		return $this->hostName;
	}
	// public function getApp(){
	// 	return $this->application;
	// }
	public function setCable($name){
		$this->cable = $name;
		//echo $this->cable." is added";
	}
	public function getCable(){
		return $this->cable;
	}
	public function getApp(){
		if(!$this->application)
			echo "null";
		else {
			foreach($this->application as $key) {
			  echo $key." ";
			}
};
	}
	public function setApp($string){
		if (!in_array($string, $this->application)) {
		    array_push($this->application,$string);
		}
	}
	public function deleteApp($string){
		//	array_splice($this->array, $string, 1);
        if (($key = array_search($string, $this->application)) !== false) {
   		    unset($this->application[$key]);
        }
   	}
}

?>