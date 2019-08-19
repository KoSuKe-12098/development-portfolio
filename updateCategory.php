<?php

    $catid = $_GET["id"];
    session_start();
    require_once "classes/classItems.php";

    $items = new items;
    $result = $items->getCategory();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="AdminAction.php" method="post">
        <?php
            foreach($result as $row){
            
            echo"Category Name "; 
            echo "<input type='text' name='catname' value='".$row['catname']."'><br>";
            echo "<input type='hidden' name='id' value='".$row['catid']."'><br>";
            }

        ?>
        <input type="submit" name="updatecat" value="Update">
    </form>
</body>
</html>