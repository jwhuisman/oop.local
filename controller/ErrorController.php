<?php

	class ErrorController{
		 public function error404($controller = DEFAULT_UNKNOWN, $action = DEFAULT_UNKNOWN)
	    {
	        header('HTTP/1.0 404 Not Found', true, 404);
	        echo "404 - Pagina niet gevonden<br><b>Controller:</b> " . $controller . "<br><b>Action: </b>" . $action;
	    }
	}