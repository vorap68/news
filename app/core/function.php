<?php
function debug($arr){
      echo '<pre>'.print_r($arr,true).'</pre>';
      
      
  }

 /**
* Построение дерева (с учетом иерархии категорий) из массива категорий методом томи лакроикс
**/
function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
    return $tree;
}

function categories_to_string($data){
    $string ='';
	foreach($data as $item){
		$string .= categories_to_template($item);
	}
	return $string;
}
function categories_to_template($category){
	ob_start();
	include 'category_template.php';
	return ob_get_clean();
}

