<?php

namespace app\controllers;

use app\core\Controller;

class AuthorController extends Controller {

 // я не использую это действие   
//    public function indexAction() {
//	$this->view->render($title);
//    }

    //общая страница входа
    public function loginAction() {
	$title="Страница входа";
	$result=[];
	//echo 'это контроллер логина';
	$this->view->render($result,$title);
    }

    // проверка существующего логина
    public function logincheckAction() {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($this->model->query_author($email, $password))
	    echo json_encode('Авторизация прошла успешно');
	else
	    echo json_encode('Ошибка авторизации');
    }

    //создание уч записи
    public function createAction() {
	if (isset($_POST['fname']) && !empty($_POST['fname'])) {
	    $fname = $_POST['fname'];
	}
	if (isset($_POST['sname']) && !empty($_POST['sname'])) {
	    $sname = $_POST['sname'];
	}
	if (isset($_POST['email']) && !empty($_POST['email'])) {
	    $email = $_POST['email'];
	}
	if (isset($_POST['password']) && !empty($_POST['password'])) {
	    $password = md5($_POST['password']);
	}
	//это отправка файла
	if (isset($_POST['my_file_upload'])) {
	    $upload_dir = 'C:/OSPanel/domains/news/assets/images';
	    $upload_files = [];
	    $file = $_FILES['avatar'];
	    $file_name = $file['name'];
	    if (move_uploaded_file($file['tmp_name'], "$upload_dir/$file_name")) {
		//echo json_encode($upload_dir.'/'.$file_name);
		$path = $upload_dir . '/' . $file_name;
	    }
	}

	if ($this->model->ins_author($fname, $sname, $email, $password, $path))
	    echo json_encode('Регистрация прошла успешно');
	else
	    echo json_encode('Ошибка регистрации');
    }

    
    public function logoutAction() {
	$_SESSION['sname'] = '';
	header("Location:/");
    }

    // получение массива всех рубрик , построение иерархич дерева и создание вида с этим деревом($result_tree)
    public function article_addAction() {
	$title="Новая статья";
	$result = $this->model->all_rubric();
	//debug($result);
	$result_tree = map_tree($result);
	//debug($result_tree);
	//$result_menu = categories_to_string($result_tree);
	$this->view->render($result_tree,$title);
	//$this->view->render($result);
    }

    
    // получение новости (всех ее полей) и запрос записи в БД
    public function add_newAction() {
	$title="Новая статья";
	//echo json_encode('addnew');
//	if (isset($_POST['author']))
//	    $author = $_POST['author'];
	if (isset($_POST['title']))
	    $title = $_POST['title'];
	if (isset($_POST['annonce']))
	    $annonce = $_POST['annonce'];
	if (isset($_POST['content']))
	    $content = $_POST['content'];
	if (isset($_POST['rubric']))
	    $rubric = $_POST['rubric'];
	if ($result = $this->model->add_new($title, $annonce, $content, $rubric))
	    echo json_encode('Новость успешно добавлена');
	else
	    echo json_encode('Произошла ошибка');
    }

   
    
//    public function getrubricAction() {
//	$this->model->getrubric();
//    }

}
