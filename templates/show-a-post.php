<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $post['title']?></h2>
    <div style="display: inline-block;">
        
        <img src="<?php echo "assets/images/".$post['image']?>" width="100px" style="float: left; padding-right: 20px;">
        <div><?php echo $post['description']?></div>
        
    </div>
    <button style="margin: 20px;"><a href="index.php">Back</a></button>
</body>
</html>