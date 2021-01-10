<?php 
class UserController{
    function getPosts(){
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
            $postView = new PostView();
            $postView->userShowPosts($posts, $page_num, $total_pages);
        }else{
            echo "No record!!!";
        }
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