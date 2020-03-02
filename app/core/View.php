<?php

namespace app\core;

class View {
    public $layout = 'main';
    public $route;
    public $path;


    public function __construct($bing) {
	$this->route = $bing;
	$this->path = $bing['controller'].'/'.$bing['action'];
    }
    
    // метод render должен получить 4 аргумента ,1-й это выборка чего- там с БД(для каждого рендера своя)
    //2-й название (title) 
    //3-й список авторов 
    //4-й список категорий
    // важна их последовательность
    public function render($result=[],$title="",$result_author=[],$result_menu=[]){
	$path = 'app/views/'.$this->path.'.php';
	//echo $path;
	ob_start();
	require $path;
	$content=ob_get_clean();
	//echo $this->route['action'];
	//if(($this->route['action'] == 'login') || ($this->route['action'] == 'article_add')) $this->layout = 'empty';
	switch ($this->route['action']){
	    case 'login':
		$this->layout = 'empty'; break;
	     case 'article_add':
		$this->layout = 'empty'; break;
	     case 'one':
		$this->layout = 'empty'; break;
             case 'index_cat':
		$this->layout = 'empty'; break;
        case 'author_all_news':
		$this->layout = 'empty'; break;
	 case 'search':
		$this->layout = 'empty'; break;
	    
	}
	//echo $title;
	require 'app/views/layouts/'.$this->layout.'.php';
    }
    public function test() {
	 return '123123_View';
    }
    
}
