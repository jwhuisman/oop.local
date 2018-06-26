<?php

	class Core{
		public $controller_name;
		public $action_name;
		public $parameters;

		public function __construct() {
	    	$this->loadHelperFiles();
	    	$this->splitUrl();
	    	$this->createControllerAndActionNames();

	    	Session::init();

	    	if (file_exists(Config::get('PATH_CONTROLLER') . $this->controller_name . '.php')) {
	            require Config::get('PATH_CONTROLLER') . $this->controller_name . '.php';
	            $this->controller = new $this->controller_name();
	            if (method_exists($this->controller, $this->action_name)) {
	                if (!empty($this->parameters)) {
	                    call_user_func_array(array($this->controller, $this->action_name), $this->parameters);
	                } else {
	                    $this->controller->{$this->action_name}();
	                }
	            } else {
	                require Config::get('PATH_CONTROLLER') . 'ErrorController.php';
	                $this->controller = new ErrorController;
	                $this->controller->error404($this->controller_name, $this->action_name);
	            }
	        } else {
	            require Config::get('PATH_CONTROLLER') . 'ErrorController.php';
	            $this->controller = new ErrorController;
	           	$this->controller->error404($this->controller_name, $this->action_name);
	        }

	  	}

	  	private function loadHelperFiles(){
			$path    = ROOT . "helper/";	
			$files = scandir($path);
	    	foreach($files as $filename){
			 	$substr = substr($filename, -4);
			 	if($substr == ".php"){
			 		require_once($path . $filename);
			 	}
			}
	  	}

	  	public static function instance()
	    {
	        static $inst = null;
	        if ($inst === null) {
	            $inst = new Core();
	        }
	        return $inst;
	    }

	    private function splitUrl()
    	{
	        if (Request::get('url')) {
	            $url = trim(Request::get('url'), '/');
	            $url = filter_var($url, FILTER_SANITIZE_URL);
	            $url = explode('/', $url);
	            $this->controller_name = isset($url[0]) ? $url[0] : null;
	            $this->action_name = isset($url[1]) ? $url[1] : null;
	            unset($url[0], $url[1]);
	            $this->parameters = array_values($url);
	        }
    	}

    	private function createControllerAndActionNames()
	    {
	        if (!$this->controller_name) {
	            $this->controller_name = Config::get('DEFAULT_CONTROLLER');
	        }
	        if (!$this->action_name OR (strlen($this->action_name) == 0)) {
	            $this->action_name = Config::get('DEFAULT_ACTION');
	        }
	        $this->controller_name = ucwords($this->controller_name) . 'Controller';
	    }


	}