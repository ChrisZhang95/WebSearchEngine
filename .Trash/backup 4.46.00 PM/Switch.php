<?php
    class Sw{
		private $Name;
		private $array = array('null','null','null','null');
		//constructor
		public function __construct($name){
            $this->Name = $name;
		}

		//gets and sets
		public function getName(){
			return $this->Name;

		}
		public function setName($name){
			$this->Name = $name;
		}
		
		
		public function getArray(){
			print_r($this->array);
		}
		public function setArray($string){
			if (!in_array($string, $this->array) && $string != 'null') {
				echo " hello";
			    for($i = 0; $i < 10; $i++){
					if($this->array[$i] == 'null'){
						$this->array[$i] = $string;
						return;
					}
				}
			}
		}
		public function deleteElmt($string){
		//	array_splice($this->array, $string, 1);
			if($this->array[0] == $string){
				$this->array[0] = 'null';
			}
            else if (($key = array_search($string, $this->array)) != false) {
                $this->array[$key] = 'null';
            }
    	}
	}

?>