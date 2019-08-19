<?php
    $itemid = $_GET["id"];

    require_once "classes/classItems.php";

    $items = new items;
    $result = $items->specificSearchItem($itemid);
    $result2 = $items->getCategory();


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
<?php foreach($result as $row2){ ?>
    <form action="AdminAction.php" method="post" enctype="multipart/form-data">
        Item Name 
            <input type="text" name="iname" value="<?php echo $row2['itemname']; ?>"><br>
        Item Price 
            <input type="number" name="iprice" value="<?php echo $row2['itemprice']; ?>"><br>
        Item Stock 
            <input type="number" name="istock" value="<?php echo $row2['itemstock']; ?>"><br>
        Item Color 
            <input type="color" name="icolor" value="<?php echo $row2['itemcolor']; ?>"><br>
        Item Size 
            <select name="isize">
                    <?php  
                        foreach($result2 as $row){
                                    $catid = $row["catid"];
                                    echo "<option value='".$row["size"]."'>".$row["size"]."</option>";
                                }
                    ?>
            </select><br>
        Comment 
            <input type="text" name="icomment" value="<?php echo $row2['itemcomment']; ?>"><br>
        Serial Number 
            <input type="text" name="serialnum" value="<?php echo $row2['serialnum']; ?>"><br>
        Item Image
        <input type="file" name="image" value="<?php echo $row2['itemimage']; ?>"><br>

        <input type="hidden" name="id" value="<?php echo $itemid; ?>"><br>
        <input type="submit" name="update" value="Update">
    </form>
<?php } ?>

<a href="admin.php">Go To Admin</a>
</body>
</html>