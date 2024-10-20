<?php
require_once 'Router.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ArticleController.php';


$authController = new AuthController();
$userController = new UserController();
$articleController = new ArticleController();


$router = new Router();


$router->addRoute('login', [$authController, 'login']);
$router->addRoute('register', [$authController, 'register']);
$router->addRoute('logout', [$authController, 'logout']);
$router->addRoute('profile', [$userController, 'profile']);
$router->addRoute('article', [$articleController, 'listArticles']);


if (isset($_GET['action'])) {
    $router->route($_GET['action']);
} else {

    $articleController->listArticles();
}
?>
