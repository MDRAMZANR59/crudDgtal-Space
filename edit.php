<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM items WHERE id = $id";
    $result = $mysqli->query($query, MYSQLI_USE_RESULT);
    $old_data = array();
    while($rs = $result->fetch_object()){
        $old_data = $rs;
    }
?>

    <form action="" method="POST">
        <fieldset>
            <legend>Update Product Details</legend>

            <label for="company">Company Name</label><br>
            <input type="text" id="company" name="company" value="<?= htmlspecialchars($old_data->company) ?>" required><br><br>

            <label for="name">Product Name</label><br>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($old_data->name) ?>" required><br><br>

            <label for="price">Price</label><br>
            <input type="number" id="price" name="price" value="<?= htmlspecialchars($old_data->price) ?>" required><br><br>

            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
        if ($_POST) {
            $name = $_POST['name'];
            $company = $_POST['company'];
            $price = $_POST['price'];
            $query = "UPDATE items SET name='$name', company='$company', price='$price', updated_at=NOW() WHERE id=$id";
            $result = $mysqli->query($query);

            if ($mysqli->affected_rows) {
                header("Location: list.php");
                exit;
            }
        }
    ?>
</body>
</html>
