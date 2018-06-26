<?php
	class Database{

		public $db;

		public function __construct(){
			$this->db = $this->createConnection();
		}

		public function createConnection(){
			$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
			$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
			return $db;
		}


	}