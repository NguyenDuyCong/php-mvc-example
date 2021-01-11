<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php if(isset($_GET['page'])) echo "../admin/add"; else echo "admin/add"; ?>" method="POST">
        <input type="submit" name="add-new" value="New">
    </form>

    <div>
        <table>
            <tr>
                <th style="border: 1px solid black">ID</th>
                <th style="border: 1px solid black">Thumb</th>
                <th style="border: 1px solid black">Title</th>
                <th style="border: 1px solid black">Status</th>
                <th style="border: 1px solid black">Action</th>
            </tr>
            <?php foreach($posts as $post):?>
                <tr>
                    <td style="border: 1px solid black"><?php echo $post["id"]?></td>
                    <td style="border: 1px solid black">
                    <img src="<?php if(isset($_GET['page'])) {echo "../assets/images/".$post["image"];} else echo "assets/images/".$post['image']; ?>" height="100px">
                    </td>
                    <td style="border: 1px solid black"><?php echo $post["title"]?></td>
                    <td style="border: 1px solid black"><?php if ($post['status'] == 1) echo "Enable"; else echo "Disable" ?></td>
                    <td style="border: 1px solid black">
                        <div>
                            <form action="<?php if(isset($_GET['page'])) echo "../admin/show/".$post['id']; else echo "admin/show/".$post['id']; ?>" method="post"> <input type="submit" name="show" value="Show"> </form> | 
                            <form action="<?php if(isset($_GET['page'])) echo "../admin/edit/".$post['id']; else echo "admin/edit/".$post['id']; ?>" method="post"> <input type="submit" name="edit" value="Edit"> </form> | 
                            <form action="<?php if(isset($_GET['page'])) echo "../admin/delete/".$post['id']; else echo "admin/delete/".$post['id']; ?>" method="post"> <input type="submit" name="delete" value="Delete"> </form> 
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>

        <!-- pagination -->
        <?php 
            for ($i = 1; $i <= $total_pages; $i++){
                if($page_num == $i){
                    echo $i;
                }else{

        ?>
            <a href="<?php if(isset($_GET['page'])) {echo "../admin/".$i;} else echo "admin/".$i; ?>"><?php echo $i. " "?></a>
        <?php
                }
            }
        ?>

        <!-- combobox -->
        <?php if((int)$total_pages > 1) {?>
            <select name="select" onchange="nextpage(this.value)">
                <?php for ($i = 1; $i <= $total_pages; $i++) {?>
                    <?php if($current_page == $i) {?>
                        <option value="<?php echo $i;?>" selected="selected">Trang <?php echo $i;?></option>
                    <?php } else {?>
                        <option value="<?php echo $i;?>">Trang <?php echo $i;?></option>
                    <?php }?>
                <?php }?>
            </select>
        <?php }?>
    
        <form name="boxpage" action="#">
            <input type="hidden" name="page">
        </form>

        <script>
            function nextpage(page){
                boxpage.page.value = page;
                boxpage.submit;
        }
        </script>
    </div>
</body>
</html>