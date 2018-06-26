<?php 
	class Calendar extends Database{

		public function getAllBirthdays(){
			$db = Database::createConnection();
			$query = $db->prepare("SELECT * FROM birthdays ORDER BY month, day");
			$query->execute();
			return $query->fetchAll();
		}

		public function getBirthday($id){
			$db = Database::createConnection();
			$query = $db->prepare("SELECT * FROM birthdays WHERE id = :id");
			$query->bindParam(":id", $id);
			$query->execute();
			return $query->fetchAll();
		}

		public function deleteBirthday($id){
			$db = Database::createConnection();
			$query = $db->prepare("DELETE FROM birthdays WHERE id = :id");
			$query->bindParam(":id", $id);
			$query->execute();
		}

		public function addBirthday($data){
			$db = Database::createConnection();
			$query = $db->prepare("INSERT INTO birthdays (`day`, `month`, `year`, `person`) VALUES (:day, :month, :year, :person)");
			$query->bindParam(":day", $data["day"]);
			$query->bindParam(":month", $data["month"]);
			$query->bindParam(":year", $data["year"]);
			$query->bindParam(":person", $data["person"]);
			$query->execute();
		}

		public function editBirthday($data){
			$db = Database::createConnection();
			$query = $db->prepare("UPDATE birthdays SET day = :id, month = :month, year = :year, person = :person WHERE id = :id");
			$query->bindParam(":day", $data["day"]);
			$query->bindParam(":month", $data["month"]);
			$query->bindParam(":year", $data["year"]);
			$query->bindParam(":person", $data["person"]);
			$query->bindParam(":id", $data["id"]);
			$query->execute();
		}
	}