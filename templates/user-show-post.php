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
                <td style="border: 1px solid black"><img src="<?php echo "assets/images/".$post['image']?>" height="100px;" alt=""></td>
                <td style="border: 1px solid black"><a href="index.php?controller=user&action=show&id=<?php echo $post['id']?>"><?php echo $post['title']?></a></td>
            </tr>
        <?php endforeach;?>
    </table>

</body>
</html>