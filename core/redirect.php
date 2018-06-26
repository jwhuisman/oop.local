<?php
	
	class Redirect{
		public static function home(){
			header('location: ' . Config::get('URL'));
		}
		public function to($path){
			header('location: ' . Config::get('URL') . $path);
		}
	}