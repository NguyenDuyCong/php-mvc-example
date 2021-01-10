<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th style="border: 1px solid black">ID</th>
            <th style="border: 1px solid black">Thumb</th>
            <th style="border: 1px solid black">Title</th>
        </tr>
        <?php foreach ($posts as $post):?>
            <tr>
                <td style="border: 1px solid black"><?php echo $post['id']?></td>
                <td style="border: 1px solid black">
                    <img src="<?php if(isset($_GET['page'])) {echo "../assets/images/".$post['image'];} else echo "assets/images/".$post['image']?>" height="100px;" alt="">
                </td>
                <td style="border: 1px solid black">
                    <a href="<?php if(isset($_GET['page'])) {echo "../user/show/".$post['id'];} else echo "user/show/".$post['id'] ?>"><?php echo $post['title']?></a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>

    <?php 
        for ($i = 1; $i <= $total_pages; $i++){
            if($page_num == $i){
                echo $i;
            }else{

    ?>
        <a href="<?php if(isset($_GET['page'])) {echo "../user/".$i;} else echo "user/".$i; ?>">
            <?php echo $i. " "?>
        </a>
    <?php
                }
            }
    ?>

    <!-- combobox -->
    <?php if((int)$total_pages > 1) {?>
        <select name="select" onchange="nextpage(this.value)">
            <?php for ($i = 1; $i <= $total_pages; $i++) {?>
                <?php if($current_page = $i) {?>
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
</body>
</html>