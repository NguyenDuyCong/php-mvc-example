<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="../admin">Back</a></button>
    <form action="../index.php?controller=admin&action=addSubmit" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td><label for="description">Description</label></td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td><label for="image">Image</label></td>
                <td>
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event);"><br>
                    <img hidden id="image" src="#" width="100px">
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
        <!-- submit -->
        <input type="submit" value="Submit">
    </form>

    <script>
        <?php require_once("assets/js/script.js")?>
    </script>
</body>
</html>