<?php
    class Application{
		private $Name;
		//private $ID;
		private $Listening_port;
		private $Protocol;

		public function __constrcut($name,$Listening_port, $Protocol){
			$this->Name = $name;
			$this->ID = $ID;
			$this->Listening_port = $Listening_port;
			$this->Protocol = $Protocol;			

		}
		public function getName(){
			echo $Name;

		}
		public function setName($name){
			$this->Name = $name;
		}
		public function getID(){
			echo $ID;

		}
		public function setID($ID){
			$this->ID = $ID;
		}
		public function getPort(){
			echo $Listening_port;

		}
		public function setPort($port){
			$this->Listening_port = $Listening_port;
		}
		public function getProtocol(){
			echo $Protocol;
		}
		public function setProtocol($Protocol){
			$this->Protocol = $Protocol;
		}


    }
?>