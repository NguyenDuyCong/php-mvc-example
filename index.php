<?php
$controller = "user";
$action = "getListPosts";
$postID = '';

if (isset($_GET['controller']) && $_GET['controller'] == 'admin'){
    $controller = 'admin';

    // default action in user page
    $action = 'getPosts';
}
require_once("./mvc/controllers/".$controller."-controller.php");

if($controller == 'user'){
    $controller = new UserController();
}else{
    $controller = new PostController();
}

if(isset($_GET['action'])){
    $action = $_GET['action'];
    // echo $action;
}

if(isset($_GET['id'])){
    $postID = $_GET['id'];
}

call_user_func([$controller, $action], $postID);

?>