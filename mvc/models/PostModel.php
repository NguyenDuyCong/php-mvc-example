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

        // Pagination
        // $counter = 0;

        // $recordsetrow = $this->con->query("SELECT COUNT(*) FROM `manage_post`");
        // $rows = mysqli_fetch_array($recordsetrow);
        
        // $total_rows = $rows[0];
        // $size_of_pages = 4;
        // $total_pages = 1;

        // if($total_rows % $size_of_pages == 0){
        //     $total_pages = $total_rows/$size_of_pages;
        // }else{
        //     $total_pages = (int)($total_rows/$size_of_pages) + 1;
        // }

        // $start_row = 1;
        // $current_page = 1;

        // if(isset($_GET['page']) || $_GET['page'] == 1){
        //     $start_row = 0;
        //     $current_page = 1;
        // }else{
        //     $start_row = ($_GET['page'] - 1) * $size_of_pages;
        //     $current_page = $_GET['page'];
        // }
    }

    function getTotalPages($size_of_pages){
        $recordsetrow = $this->con->query("SELECT COUNT(*) FROM `manage_post`");
        $rows = mysqli_fetch_array($recordsetrow);
        
        $total_rows = $rows[0];
        $total_pages = 1;

        if($total_rows % $size_of_pages == 0){
            $total_pages = $total_rows/$size_of_pages;
        }else{
            $total_pages = (int)($total_rows/$size_of_pages) + 1;
        }

        return $total_pages;
    }

    function getPosts($page_num, $size_of_pages){
        
        $start_row = 0;
        if ($page_num > 1){
            $start_row = ($page_num - 1) * $size_of_pages;
        }

        $result = $this->con->query("SELECT * FROM manage_post LIMIT ".$start_row.", ".$size_of_pages."");
        $posts = array();
        if($result->num_rows > 0){
            while($post = mysqli_fetch_assoc($result)){
                $posts[] = $post;
            }
        }

        $this->con->close();
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
        $this->con->close();
        return $post;

        
    }

    function addPost(){
        $out_dir = "assets/images/";
        
        if(!file_exists($out_dir)){
            @mkdir($out_dir, 0777);
        }
        
        $image_name = $_FILES['image']['name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        
        $random_no = rand(0,10000);
        $rename = 'Upload'.date('Ymd').$random_no;
        $new_image_name = $rename.".".$image_ext;
        
        // move image file to assets/images
        if(!file_exists($out_dir.$_FILES['image']['name'])){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $out_dir.$new_image_name)){
                echo "Successfull!";
            };
        }

        // save data-form to database
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        // echo $date;
        $query = "INSERT INTO `manage_post` (`id`, `title`, `description`, `image`, `status`, `create_at`, `update_at`) VALUES (NULL, '". $_POST['title'] ."', '". $_POST['description'] ."', '". $new_image_name ."', '". $_POST['status'] ."', '". $date ."', NULL);";

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
        $this->con->close();

        // move image file to assets/images
        // $query = "UPDATE `manage_post` SET `title`=".$_POST['title'].", `description`=".$_POST['description'].", `image`".$_POST['image'];
    }

    function deletePost($id){
        
        $query = "SELECT * FROM `manage_post` WHERE `id`=".$id;

        $result = $this->con->query($query);
        if($result->num_rows > 0) {
            $post = mysqli_fetch_array($result);
        }else{
            echo "No post in database";
        }

        $image_path = 'assets/images/'.$post['image'];
        if (file_exists($image_path)){
            unlink($image_path);
            echo "delete image in".$image_path;
        } else{
            echo "image is not exists in ".$image_path;
        }



        $query = "DELETE FROM `manage_post` WHERE `id` = ".$id.";";
        // echo $query;

        $this->con->query($query);
        $this->con->close();
    }
}