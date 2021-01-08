<?php
class PostView{
    function ShowAllPost($posts, $page_num, $total_pages){
        require_once("./templates/posts.php");
    }

    function userShowPosts($posts, $page_num, $total_pages){
        require_once("./templates/user-show-post.php");
    }
}
?>