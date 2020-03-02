<?php

//use app\controllers\NewsController;

namespace app\core;

require_once 'routes.php';

class Router {

    protected $route = [];
    protected $params = [];

    public function __construct() {
	$arr = require 'routes.php';
	foreach ($arr as $key => $value) {
//	    echo '$key='.$key.'<hr>';
	    $this->add($key, $value);
	}
	//print_r($this->route);
    }

    public function add($key, $value) {
	$key = '#^' . $key . '$#';
	$this->route[$key] = $value;
    }

    public function match() {
	$url = trim($_SERVER['REQUEST_URI'], '/');
	if(strrpos($url,'?')){
	    $url_arr = explode('?', $url);
	    
	    $url = $url_arr[0];
	    $_SESSION['rubric']= urldecode($url_arr[1]);
	    //debug($url_arr);
	}
	//echo '<hr>$url:' . $url . '<hr>';
	foreach ($this->route as $key => $value) {
	    //echo $key.'<hr>';
	    if (preg_match($key, $url, $matches)) {
		$this->params = $value;
		//debug($value);
		return true;
	    }
	}
	 echo "No_route:".$url;
	return false;
    }

    public function run() {
	if ($this->match()) {
	    //print_r($this->params);
	    // if('app/controller/'.$this->params['controller'].'.php';
	    $path = 'app\controllers\\' . ucfirst($this->params['controller'] . 'Controller');
	    //echo $class.'<hr>';
	    if (class_exists($path)) {
		$action = $this->params['action'] . 'Action';
		//echo $action.'<hr>';
		if (method_exists($path, $action)) {
		    $controller = new $path($this->params);
		    $controller->$action();
		}
		else echo "No_method:".$action;
	    }
	    else echo "No_class:".$this->params['controller'];
	}
	}

}
