<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $post['title']?></h2>
    <div style="height: 150px;">
        
        <img src="<?php echo "../../assets/images/".$post['image']?>" height="150pxpx" style="float: left; padding-right: 20px;">
        <div><?php echo $post['description']?></div>
        
    </div>
    <button style="margin: 20px;"><a href="<?php if($_GET['controller']=='user') {echo "../../user";} else echo "../../admin";?>">Back</a></button>
</body>
</html>