<?php
	class CalendarController{
		public function index(){
			View::multiRender(
				array(
					"template/header", 
					"calendar/overview",
					"template/footer"
				),
				array(
					"birthdays" => Calendar::getAllBirthdays()
				)	
			);
		}

		public function delete($id = 0){
			Calendar::deleteBirthday($id);
			Redirect::to("/calendar");
		}

		public function edit($id = 0){
			if($id == 0){
				Redirect::to("/calendar");
			}
			if(Request::isPost()){
				$data = array(
					"day" => Request::post("day"),
					"month" => Request::post("month"),
					"year" => Request::post("year"),
					"person" => Request::post("person"),
					"id" => Request::post("id")
				);
				Calendar::editBirthday($data);
				Redirect::to("/calendar");
			}	

			$birthday = Calendar::getBirthday($id);

			View::multiRender(
				array(
					"template/header", 
					"calendar/edit",
					"template/footer"
				),
				array(
					"birthday" => $birthday[0]
				)
			);

		}

		public function add(){
			if(Request::isPost()){
				$data = array(
					"day" => Request::post("day"),
					"month" => Request::post("month"),
					"year" => Request::post("year"),
					"person" => Request::post("person")
				);
				Calendar::addBirthday($data);
				Redirect::to("/calendar");
			}	
			View::multiRender(
				array(
					"template/header", 
					"calendar/add",
					"template/footer"
				)	
			);
		}
	}
	