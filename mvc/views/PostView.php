<?php
class PostView{
    function ShowAllPost($posts){
        require_once("./templates/posts.php");
    }

    function userShowPosts($posts){
        require_once("./templates/user-show-post.php");
    }
}
?>