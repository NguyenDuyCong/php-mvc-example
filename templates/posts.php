<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="?action=add" method="POST">
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
                    <td style="border: 1px solid black"><img src="<?php echo "assets/images/".$post["image"]?>" width="100px"></td>
                    <td style="border: 1px solid black"><?php echo $post["title"]?></td>
                    <td style="border: 1px solid black"><?php echo $post['status']?></td>
                    <td style="border: 1px solid black"><a href="#">Show</a> | <form action="?action=edit&id=<?php echo $post['id']?>" method="post"> <input type="submit" name="edit" value="Edit"> </form> | <a href="#">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>