<?php

    require_once "classes/classItems.php";
    include "color.php";

    $items = new items;
    $color1 = new ColorInterpreter;
    $result = $items->getCategory();
    $result4 = $items->getItemInfo();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center">ADMIN PAGE</h1><a href="logout.php">Logout</a><br><br>
    <a href="seeAllItems.php">ALL ITEMS</a><br><br><a href="showComment.php">ALL COMMENT</a>
    <div class="row">
        <div class="col-6">
             <div class="card">
                <!-- アイテムを追加するときのフォーム -->
                <h2>Add Items</h2>
                <form action="AdminAction.php" method="post" enctype="multipart/form-data"　class="txet-center">
                Item Name
                    <input type="text" name="name" placeholder="Item Name"><br><br>
                Item Price
                    <input type="number" name="price" placeholder="Item Price"><br><br>
                Item Stock
                    <input type="number" name="stock" placeholder="Item Stock"><br><br>
                Item Color
                    <input type="color" name="color" placeholder="Item Color"><br><br>
                Item Size
                    <select name="size">
                    <?php  
                        foreach($result as $row){
                                    
                                    echo "<option value='".$row["size"]."'>".$row["size"]."</option>";
                                }
                    ?>
                    </select><br><br>
                Item Comment
                    <input type="text" name="com" placeholder="Item Comment"><br><br>
                Serial Number
                    <input type="text" name="serialnum" placeholder="Serial Number"><br><br>
                Item Image
                    <input type="file" name="image"><br><br>
                Item Category
                    <select name="catname">
                    <?php  
                        foreach($result as $row){
                                    $catid = $row["catid"];
                                    echo "<option value='".$catid."'>".$row["catname"]."</option>";
                                }
                    ?>
                    </select><br><br>
                    <input type="hidden" name="catid" value="<?php echo $catid?>">
                    <input type="submit" name="add" value="Add" class="btn-danger"><br><br>
                </form>
            </div>
        </div>
        <div class="col-6">
             <div class="card">
                 <!-- カテゴリを追加 -->
                 <h2>Add Category</h2>
                <form action="AdminAction.php" method="post">
                    <input type="text" name="catname" placeholder="Category Name">
                    <input type="submit" name="addcat" value="Add Category" class="btn-success">
                </form><br>
                <!-- カテゴリの変更 -->
                <h2>Update Category</h2>
                    <table>
                    <tr class="bg-primary text-white">
                        <th>Category Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php  

                        foreach($result as $row){
                            
                            $catid = $row["catid"];
                            echo "<tr>";
                            echo "<td>".$row["catname"]."</td><br>";
                            echo "<td><a href='updateCategory.php?id=$catid'>>>Update</a></td>";
                            echo "<td><a href='AdminAction.php?actiontype=deletecat&id=$catid'>>>Delete</a></td><br>";
                            echo "</tr>";
                        }
        
                    ?>
                    </table><br>
            </div>
        </div>    
    </div>
    
   
        </div>
    </div>
</div>
</body>
</html>
