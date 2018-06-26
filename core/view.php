<?php

	class View{

		public function render($template, $data = NULL){
			if ($data) {
				foreach($data as $key => $value) {
					$$key = $value;
				}
			} 
			require(ROOT . 'view/' . $template . '.php');
		}

		public function multiRender($templates, $data = null){
			if ($data) {
				foreach($data as $key => $value) {
					$$key = $value;
				}
			} 

			foreach($templates as $template){
				require(ROOT . 'view/' . $template . ".php");
			}

		}

		public function JSON($data){
			header("Content-Type: application/json");
        	echo json_encode($data);
		}



		


	}