<?php
    class Cable{
		private $Name;
		private $Type;
		private $Speed;
		private $Socket;
		private $computers = ['null', 'null'];

		public function __construct($speed, $name, $type, $socket){
			$this->Speed = $speed;
			$this->Name = $name;
			$this->Type = $type;
			$this->Socket = $socket;

		}
		public function getName(){
			return $this->Name;

		}
		public function setName($name){
			$this->Name = $name;
		}
		public function getSocket(){
			return $this->Socket;

		}
		public function setSocket($socket){
			$this->Socket = $socket;
		}
		public function getType(){
			return $this->Type;

		}
		public function setType($type){
			$this->Type = $type;
		}
		public function getSpeed(){
			return $this->Speed;
		}
		public function setSpeed($speed){
			$this->Speed = $speed;
		}
		public function setComputer($computer){
			if($this->computers[0] == 'null'){
				$this->computers[0] = $computer;
			}
			else if ($this->computers[1] == 'null' && $computer != $this->computers[0]){
				$this->computers[1] = $computer;
			}
			// else{
			// 	echo $computer."Something is wrong with function setComputer()";
			// }
		}
		public function deleteComputer($computer){
			//echo " i am here";
			if($this->computers[0] == $computer){
				$this->computers[0] = 'null';
			}
			else if ($this->computers[1] == $computer){
				$this->computers[1] = 'null';
			}
		}

		public function getComputers(){
			return $this->computers;
		}

    }
?>