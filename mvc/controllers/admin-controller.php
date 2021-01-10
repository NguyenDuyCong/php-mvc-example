<?php
class PostController{
    function getPosts() {
        
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        
        $size_of_page = 4;
        $total_pages = $model->getTotalPages($size_of_page);
        
        
        $page_num = 1;
        if (isset($_GET['page'])){
            $page_num = $_GET['page'];
        }

        if ($page_num <= $total_pages) {
            $posts = $model->getPosts($page_num, $size_of_page);

            require_once("./mvc/views/PostView.php");
            $view = new PostView();
            $view->ShowAllPost($posts, $page_num, $total_pages);
        }else{
            echo "No record!!!";
        }

    }

    function add(){
        require("./mvc/views/add-post.php");
        $addView = new AddPost();
        $addView->addAPost();
    }

    function addSubmit() {
        require_once("./mvc/models/PostModel.php");
        $addPost = new PostModel();
        $addPost->addPost();
        // direct to index.php?controller=admin
        header("Location: admin");
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

        // direct to index.php?controller=admin
        header("Location: admin");
        exit(); 
    }

    function delete($id){
        require_once("./mvc/models/PostModel.php");
        $model = new PostModel();
        $model->deletePost($id);

        // direct to index.php?controller=admin
        header("Location: ../../admin");
        exit();
    }

}
?>
