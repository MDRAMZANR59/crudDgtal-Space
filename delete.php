<?php
 include_once('connection.php');
 $id=$_GET['id'];
 $query="delete from items where id=$id";
 $result=$mysqli->query($query);
 if($mysqli->affected_rows)
    header("location:list.php");
?>