<?php
include_once("controller/Controller.php");

$controller = new Controller();

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'register':
			$controller->showRegistration();
			break;
		case 'login':
			$controller->showLogin();
			break;
		case 'logout':
		    $controller->logoutUser();
			break;
		case 'book':
			$controller->showBooks();
			break;
		case 'filterBooks':
			$controller->filterBooks();
			break;
		case 'bookForm':
			$controller->showBookForm();
			break;
		case 'addNewBook':
			$controller->addNewBook();
			break;
		case 'deleteBook':
			$controller->deleteBook();
			break;
		case 'editBookForm':
			$controller->editBookForm();
			break;
		case 'editBook':
			$controller->editBook();
			break;
		case 'addUser':
			$controller->addUser();
			break;
		case 'loginUser':
			$controller->loginUser();
		default:
			$controller->showLogin();
			break;
	}
} else {
	$controller->showLogin();
}
