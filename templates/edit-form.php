<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="index.php?controller=admin&action=show&id=<?php echo $post['id']?>">Show</a></button>
    <button><a href="index.php?controller=admin">Back</a></button>

    <form action="?controller=admin&action=updatePost&id=<?php echo $post['id']?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="tittextle">Title</label></td>
                <td><input type="text" name="title" value="<?php echo $post['title']?>"></td>
            </tr>
            <tr>
                <td><label for="description">Description</label></td>
                <td><input type="text" name="description" value="<?php echo $post['description']?>"></td>
            </tr>
            <tr>
                <td><label for="image">Image</label></td>
                <td>
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event);"><br>
                    <img id="image" src="<?php echo "assets/images/".$post['image']?>" width="100px;">
                </td>
            </tr>
            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <select name="status" name="status">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="Submit">
    </form>

    <script>
        <?php require_once("assets/js/script.js")?>
    </script>
</body>
</html>