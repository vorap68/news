<?php

namespace app\core;
use app\core\View;


 abstract class Controller {
    
   public $route;
   public $view;
   public $model;
   public function __construct($bing) {
	//print_r($route);
       $this->route = $bing;
       $this->view = new View($bing);
      // $this->db = new Db();
       $this->model = $this->loadmodel($this->route['controller']);
       
    }
    public function loadmodel($name){
	$path = 'app\models\\'.ucfirst($name);
	if(class_exists($path)){
	   return new $path;
	} 
//	else echo 'no_Model';
	
    }
   
}
