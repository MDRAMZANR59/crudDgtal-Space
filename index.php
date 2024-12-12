<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="POST">
        <fieldset>
            <legend>Enter Product Details</legend>

            <label for="company">Company Name</label><br>
            <input type="text" id="company" name="company" required><br><br>

            <label for="name">Product Name</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="price">Price</label><br>
            <input type="number" id="price" name="price" required><br><br>

            <button type="submit">Submit</button>
        </fieldset>
    </form>
    <?php
        if($_POST){
            $name=$_POST['name'];
            $company=$_POST['company'];
            $price=$_POST['price'];
            $query="insert into items set name='$name', company='$company', price='$price', created_at=now()";
            $result=$mysqli->query($query);
            header("location:list.php?insert_id=$mysqli->insert_id");
        }
    ?>
</body>
</html>