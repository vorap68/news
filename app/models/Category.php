<?php

namespace app\models;
use app\core\Db;

class Category {
      public function __construct() {
	$this->db = new Db();
    }
    
   // будем обращаться к  уже существующему методу класса DB который получ ВСЕ новости
  
public function rubrik_all_new() {
   
    $result = $this->db->rubrik_all_news();
    return $result;
}    
    
}
