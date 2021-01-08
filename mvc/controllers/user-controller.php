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

    function show($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $post = $model->getPostByID($id);

        require_once("./mvc/views/show-post.php");
        $showPost = new ShowPost();
        $showPost->getPost($post);
    }
}
?>