<?php
$controller = "admin";
$action = "getPost";
$postID = '';

require_once("./mvc/controllers/admin-controller.php");

$controller = new PostController();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    // echo $action;
}

if(isset($_GET['id'])){
    $postID = $_GET['id'];
}

call_user_func([$controller, $action], $postID);

?>