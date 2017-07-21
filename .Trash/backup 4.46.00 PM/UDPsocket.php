<?php
    class UDPsocket{
		private $source_IP;
		private $dest_IP;
		private $app_Port;

		
		public function __construct($source_IP, $dest_IP){
			$this->source_IP = $source_IP;
			$this->dest_IP = $dest_IP;
		//echo  "Computer '".$this->userName."' with hostname '".$this->hostName."' and IP address '".$this->IPaddress."' is created!!";
		}

		public function getSourceIP(){
			echo $this->source_IP;

		}
		public function setSourceIP($source_IP){
			$this->source_IP = $source_IP;
		}
		public function getDestIP(){
			echo $this->dest_IP;

		}
		public function setDestIP($dest__IP){
			$this->dest_IP = $dest__IP;
		}

    }
?>