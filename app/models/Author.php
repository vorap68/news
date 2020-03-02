<?php

namespace app\models;

use app\core\Db;

class Author {

    public function __construct() {
	$this->db = new Db();
    }

    public function ins_author($fname, $sname, $email, $password, $path) {
	$sql = "INSERT INTO `authors` SET `fname`=:fname,`sname`=:sname,`email`=:email, `password`=:password,`avatar`=:path";
	$result = $this->db->ins_author($fname, $sname, $email, $password, $path, $sql);
	return $result;
    }

    public function query_author($email, $password) {
	$sql = "SELECT * FROM `authors` WHERE `email`=:email";
	$result = $this->db->query_author($email, $password, $sql);

	return $result;
    }

    public function add_new($title, $annonce, $content, $rubric) {
	$sql = "INSERT INTO `new` SET `author`=:author,`title`=:title, `annonce`=:annonce,`content`=:content, `rubric`=:rubric";
	$result = $this->db->ins_new($title, $annonce, $content, $rubric, $sql);
	if ($result)
	    return TRUE;
	return FALSE;
    }

    public function all_rubric() {
	$sql = "SELECT * FROM `rubric`";
	$result = $this->db->all_rubric($sql);
	return $result;
    }
    
    
    

}
