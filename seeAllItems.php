<?php
session_start();
    require_once "classes/classItems.php";
    include "color.php";

    $items = new items;
    $color1 = new ColorInterpreter;
    $result = $items->getCategory();
    $result2 = $items->getContact();
    $result4 = $items->getItemInfo();
    $result5 = $items->getDeliveryPersonInfo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALL ITEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center">ALL ITEMS PAGE</h1><a href="logout.php">LOGOUT</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- アイテムの修正 -->
                        <table class='w-100 text-center'>
                            <tr>    
                                <th class='bg-dark text-white'> ID</th>
                                <th class='bg-dark text-white'> Name</th>
                                <th class='bg-dark text-white'> Price</th>
                                <th class='bg-dark text-white'> Stock</th>
                                <th class='bg-dark text-white'> Color</th>
                                <th class='bg-dark text-white'> Size</th>
                                <th class='bg-dark text-white'> Comment</th>
                                <th class='bg-dark text-white'> Serial Number</th>
                                <th class='bg-dark text-white'> Image</th>
                                <th class='bg-dark text-white'></th>
                                <th class='bg-dark text-white'></th>
                                <th class='bg-dark text-white'></th>
                                
                            </tr>
                            <?php
                           
                                foreach($result4 as $row){
                                    $itemid = $row["itemid"];
                                    $image = $row["itemimage"];
                                    $colorname = $row["itemcolor"];
                                    $result = $color1->name($colorname);
                                    echo "<tr>
                                            <td>".$row["itemid"]."</td>
                                            <td>".$row["itemname"]."</td>
                                            <td>".$row["itemprice"]."</td>
                                            <td>".$row["itemstock"]."</td>
                                            <td>".$result["name"]."</td>
                                            <td>".$row["itemsize"]."</td>
                                            <td>".$row["itemcomment"]."</td>
                                            <td>".$row["serialnum"]."</td>
                                            <td><img src= 'images/$image'　class='w-50'></td>
                                            <td><a href='updateItem.php?id=$itemid'>>>Update</a><td>
                                            <td><a href='AdminAction.php?actiontype=delete&id=$itemid'>>>Delete</a><td>
                                        </tr>";
                                }
                            ?>
                            
                        </table>
            </div>
        </div>
    </div>
</div>