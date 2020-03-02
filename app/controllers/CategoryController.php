<?php

namespace app\controllers; 
use app\core\Controller;

class CategoryController extends Controller{
    
    public function index_catAction (){
	$result = $this->model->rubrik_all_new();
       $this->view->render($result);
	
    }
   
    
}
