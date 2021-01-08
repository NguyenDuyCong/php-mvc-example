<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="?controller=admin&action=add" method="POST">
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
                    <td style="border: 1px solid black"><img src="<?php echo "assets/images/".$post["image"]?>" height="100px"></td>
                    <td style="border: 1px solid black"><?php echo $post["title"]?></td>
                    <td style="border: 1px solid black"><?php echo $post['status']?></td>
                    <td style="border: 1px solid black">
                        <div>
                            <form action="?controller=admin&action=show&id=<?php echo $post['id']?>" method="post"> <input type="submit" name="show" value="Show"> </form> | 
                            <form action="?controller=admin&action=edit&id=<?php echo $post['id']?>" method="post"> <input type="submit" name="edit" value="Edit"> </form> | 
                            <form action="?controller=admin&action=delete&id=<?php echo $post['id']?>" method="post"> <input type="submit" name="delete" value="Delete"> </form> 
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>