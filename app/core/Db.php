<?php

namespace app\core;

use PDO;

class Db {

    public $db;

    public function __construct() {
	$dsn = "mysql:host=127.0.0.1;dbname=news;charset=utf8";
	 $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	$this->db = new PDO($dsn, 'root', 'dmitry13',$opt);
    }

    //Добавляем нового автора по запросу AuthorController 
    public function ins_author($fname,$sname,$email,$password,$path,$sql) {
	$stmt = $this->db->prepare($sql);
	$result = $stmt->execute(array('fname' => $fname,'sname'=>$sname,'email' => $email, 'password' => $password, 'path' => $path));
	return $result;
    }

    
    // Получаем массив email-ов и паролей всех авторов для авторизации  по запросу AuthorController 
    public function query_author($email,$password,$sql) {
	$stmt = $this->db->prepare($sql);
	$stmt->execute(array('email'=>$email));
	$result=$stmt->fetch();
	if($result['password']=== md5($password)){
	    $_SESSION['sname'] = $result['sname'];
	    return true;
	}
	else return false;
    }
    
     // Добавляем новость  по запросу AuthorController 
    public function ins_new($title, $annonce, $content,$rubric,$sql) {
	$author = $_SESSION['sname'];
	$stmt= $this->db->prepare($sql);
	$result = $stmt->execute(array('author'=>$author,'title'=>$title,'annonce'=>$annonce,'content'=>$content,'rubric'=>$rubric));
	if($result) return true;
	return FALSE;
	//return true;
	}
    
	//Получаем все рубрик для создания новости (в форме ) в AuthorController
	public function all_rubric($sql) {
	    $stmt = $this->db->prepare($sql);
	    $stmt->execute();
	    $result=array();
	    while ($row = $stmt->fetch()){
	    $result[$row['id']] = $row;
		}
	    //$result = $stmt->fetchAll();
	   return $result;
	    }
	    
	 // Получаем все новости одного автора по запросу NewsController
	public function author_all_news($sql,$sname) {
	    $stmt=$this->db->prepare($sql);
	    $stmt->execute(array('author'=>$sname));
	    $result = $stmt->fetchAll();
	    return $result;
	   }
	   
	   //Получаем все новости для стартовой страницы  
	   public function all_news() {
	       $stmt = $this->db->prepare("SELECT * FROM `new`");
	       $stmt->execute();
	       $result = $stmt->fetchAll();
	       return $result;
	       }
	       
	       
	    // Получаем одну новость  по запросу NewsController 
	   public function one_new($sql,$id) {
	       $stmt=$this->db->prepare($sql);
	       $stmt->execute(array('id'=>$id));
	       $result = $stmt->fetch();
	       return $result;
		   }
		   
	 // Получаем список всех авторов по запросу NewsController 	  
		   public function all_authors($sql) {
		       $stmt=$this->db->prepare($sql);
		       $stmt->execute();
		       $result = $stmt->fetchAll();
		       return $result;
		       
		   }
		   
	// Получаем все новости одной категории по запросу CategoryController	 
	public function rubrik_all_news() {
	    $stmt = $this->db->prepare("SELECT * FROM `new` WHERE `rubric`=:rubric");
            //echo $_SESSION['rubric'];
            $stmt->execute(array('rubric'=>$_SESSION['rubric']));
            $result = $stmt->fetchAll();
            return $result;
	}
	
	//Ищем новость по названию
	public function search_name($sql,$name) {
	    $stmt =$this->db->prepare($sql);
	    $stmt->execute(array('title'=>$name));
	    return $stmt->fetch();
	}
}
