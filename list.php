<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"> Add New</a>
    <table>
        <tr>
            <th>#SL</th>
            <th>company</th>
            <th>Name</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
        <?php
            $query="select * from items order by name";
            $result=$mysqli->query($query,MYSQLI_USE_RESULT);
            $i=1;
            while($rs=$result->fetch_object()){
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $rs->company ?></td>
                <td><?= $rs->name ?></td>
                <td><?= $rs->price ?></td>
                <td><?= $rs->created_at ?></td>
                <td>
                    <a href="edit.php?id=<?= $rs->id ?>"> Update</a>
                    <a href="delete.php?id=<?= $rs->id ?>"> Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>