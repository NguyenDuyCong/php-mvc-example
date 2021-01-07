<?php
class PostModel{
    public $con;
    protected $hostname = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'mvc';
    
    function __construct()
    {
        $this->con = mysqli_connect(
            $this->hostname, 
            $this->username,
            $this->password,
            $this->dbname,
        );
    
        $this->con->set_charset('utf-8');
    
        if($this->con->connect_errno){
            echo "Failed to connect to MySQL: " . $this->con->connect_error;
            exit();
        }
    }
    function getPost(){
        $result = $this->con->query("SELECT * FROM manage_post");
        $posts = array();
        if($result->num_rows > 0){
            while($post = mysqli_fetch_assoc($result)){
                $posts[] = $post;
            }
        }

        return $posts;

    }

    function getPostByID($id){
        $query = "SELECT * FROM manage_post WHERE id = " . $id;
        // echo $query;
        
        $result = $this->con->query($query);

        if($result->num_rows > 0) {
            $post = mysqli_fetch_array($result);
        }else{
            echo "No post in database";
        }

        // print_r($post);
        return $post;

        
    }

    function addPost(){
        $out_dir = "assets/images/";
        
        if(!file_exists($out_dir)){
            @mkdir($out_dir, 0777);
        }
        // move image file to assets/images
        if(!file_exists($out_dir.$_FILES['image']['name'])){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $out_dir.$_FILES['image']['name'])){
                echo "Successfull!";
            };
        }

        // save data-form to database
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        // echo $date;
        $query = "INSERT INTO `manage_post` (`id`, `title`, `description`, `image`, `status`, `create_at`, `update_at`) VALUES (NULL, '". $_POST['title'] ."', '". $_POST['description'] ."', '". $_FILES['image']['name'] ."', '". $_POST['status'] ."', '". $date ."', NULL);";

        // echo $query;
        $this->con->query($query);
        $this->con->close();
        // echo $_FILES['image']['name'];
        // echo $_FILES['image']['tmp_name'];

    }

    function updatePost($id){
        $out_dir = "assets/images/";
        $image_file = '';
        
        if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
            $image_file = $_FILES['image']['name'];
            
            // move to assests/images if file is not exist
            if(!file_exists($out_dir.$_FILES['image']['name'])){
                if (move_uploaded_file($_FILES['image']['tmp_name'], $out_dir.$_FILES['image']['name'])){
                    echo "Successfull!";
                };
            }
        }

        $add_image = '';
        if($image_file) {
            $add_image = "`image`='".$image_file."',";
        }
        // echo $add_image;
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");

        $query = "UPDATE `manage_post` 
                SET `title`='".$_POST['title']."', `description`='".$_POST['description']."', ".$add_image." `status`=".$_POST['status'].
                ", `update_at`='".$date."' WHERE `id`=".$id;
        // echo $query;
        $this->con->query($query);

        // move image file to assets/images
        // $query = "UPDATE `manage_post` SET `title`=".$_POST['title'].", `description`=".$_POST['description'].", `image`".$_POST['image'];
    }

    function deletePost($id){
        $query = "DELETE FROM `manage_post` WHERE `id` = ".$id.";";
        // echo $query;
        $this->con->query($query);

        header("Location: index.php");
        exit();
    }
}