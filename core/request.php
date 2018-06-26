<?php
	class Request{
		public static function post($key){
			if (isset($_POST[$key])) {
				return $_POST[$key];
			}
		}

		public static function postCheckbox($key)
	    {
	        return isset($_POST[$key]) ? 1 : NULL;
	    }

	    public static function get($key)
	    {
	        if (isset($_GET[$key])) {
	            return $_GET[$key];
	        }
	    }

	    public static function isPost(){
	    	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }

	}