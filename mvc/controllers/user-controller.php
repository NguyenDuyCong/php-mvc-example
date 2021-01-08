<?php 
class UserController{
    function getListPosts(){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $posts = $model->getPosts();

        require_once("./mvc/views/PostView.php");
        $postView = new PostView();
        $postView->userShowPosts($posts);
    }
}
?>