<?php

namespace app\controllers;
use app\core\Controller;

class NewsController extends Controller {
    
	 public function indexAction() {
	     $title = "Все новости";
	    $result_news = $this->model->all_news();
	    $result_authors = $this->model->all_authors();
	    $result_cat = $this->model->all_rubric();
	   $result_tree = map_tree($result_cat);
	   $result_menu = categories_to_string($result_tree);
	   //debug($result_tree);
	   //var_dump($result_menu);
	    $this->view->render($result_news,$title,$result_authors,$result_menu);
	}
	
	public function author_all_newsAction() {
	    $title = "Все новости автора";
	 $result = $this->model->author_all_news($_POST['sname']);
	 $this->view->render($result,$title);
	   // print_r($result);
		 
	    }	
	    
	    public function oneAction() {
		$title = "Одна новость";
		if(!empty($_POST['id'])) $id = $_POST['id']; 
		$result = $this->model->one_new($id);
		$this->view->render($result,$title);
		
		//print_r($result);
	    }
            public function searchAction() {
		if(isset($_POST['search_name']) && !empty($_POST['search_name'])){
		    $result = $this->model->search_name($_POST['search_name']);
		};
		if(isset($_POST['search_words']) && !empty($_POST['search_words'])){
		    $result = $this->model->search_words($_POST['search_words']);
		};
		$this->view->render($result);
               
            }

	   
}
