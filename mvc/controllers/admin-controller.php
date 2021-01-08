<?php
class PostController{
    function getPost() {
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $posts = $model->getPost();

        require_once("./mvc/views/PostView.php");
        $view = new PostView();
        $view->ShowAllPost($posts);
    }

    function add(){
        require("./mvc/views/add-post.php");
        $addView = new AddPost();
        $addView->addPost();
    }

    function addSubmit() {
        require_once("./mvc/models/PostModel.php");
        $addPost = new PostModel();
        $addPost->addPost();
        // direct to index.php
        header("Location: index.php");
        exit(); 
    }

    function show($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $post = $model->getPostByID($id);

        require_once("./mvc/views/show-post.php");
        $showPost = new ShowPost();
        $showPost->getPost($post);
    }

    function edit($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $post = $model->getPostByID($id);
        // print_r($post);

        require_once("./mvc/views/edit-post.php");
        $editPost = new EditPost();
        $editPost->showPost($post);

    }

    function updatePost($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $model->updatePost($id);

        // direct to index.php
        header("Location: index.php");
        exit(); 
    }

    function delete($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $model->deletePost($id);
    }

}
?>
