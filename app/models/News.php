<?php

namespace app\models;
 
use app\core\Db;

class News {
 
    public function __construct() {
	$this->db= new Db();
    }
    
    public function all_news() {
	$result = $this->db->all_news();
	return $result;
    }
    
    public function author_all_news($sname) {
	$sql ="SELECT * FROM `new` WHERE `author`=:author";
	$result = $this->db->author_all_news($sql,$sname);
	return $result;
    }
    public function one_new($id) {
	$sql = "SELECT `author`,`content` FROM `new` WHERE `id_new`=:id";
	$result = $this->db->one_new($sql,$id);
	return $result;
	
    }
    public function all_authors(){
	$sql = "SELECT `id_author`,`sname` FROM `authors`";
	$result = $this->db->all_authors($sql);
	return $result;
    }
    public function all_rubric() {
	$sql = "SELECT * FROM `rubric`";
	$result = $this->db->all_rubric($sql);
	return $result;
	}
	
	public function search_name($name) {
	    $sql = "SELECT `title`,`content`,`author`,`rubric` FROM `new` WHERE `title`=:title";
	    $result =  $this->db->search_name($sql,$name);    
	    return $result;
	}
}
