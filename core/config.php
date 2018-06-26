<?php
	
	class Config{		

		public function __construct() {
			require_once(ROOT . "/config/config.php");
		}

		public function get($name){
			return constant($name);
		}

		public function set($name, $value){
			if(empty($value)){
				echo "No value set to decleration of " . $name;
				return false;
			}
			if(defined($name)){
				return false;
			} 
			define($name, $value);
			return true;
		}


	}