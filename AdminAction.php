<?php
    session_start();

    require_once "classes/classItems.php";
    

    $items = new items;


    if(isset($_POST["add"])){

        $name = $_POST["name"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $color = $_POST["color"];
        $size = $_POST["size"];
        $comment = $_POST["com"];
        $serialnum = $_POST["serialnum"];
        $image = $_FILES['image']['name'];
        $catid = $_POST["catid"];

        $items->AddItem($name,$price,$stock,$color,$size,$comment,$serialnum,$image,$catid);
    
    }else if(isset($_POST["addcat"])){

        $catname = $_POST["catname"];
        $size = $_POST["size"];

        $items->AddCategory($catname,$size);

    }else if(isset($_POST["showcomment"])){

        $formid = $_POST["comment"];
        $_SESSION["searchID"] = $formid;

        header("Location: showComment.php");
       
    }else if(isset($_POST["update"])){

        $iname = $_POST["iname"];
        $iprice = $_POST["iprice"];
        $istock = $_POST["istock"];
        $icolor = $_POST["icolor"];
        $isize = $_POST["isize"];
        $icomment = $_POST["icomment"];
        $serialnum = $_POST["serialnum"];
        $itemid = $_POST["id"];
        $image = $_FILES['image']['name'];

        $items->updateItems($iname,$iprice,$istock,$icolor,$isize,$icomment,$image,$serialnum,$itemid);

        
    }else if($_GET["actiontype"] == 'delete'){

        $itemid = $_GET["id"];

        $items->deleteItem($itemid);

    }else if(isset($_POST["updatecat"])){

        $catname = $_POST["catname"];
        $id = $_POST["id"];
        $items->updateCategory($catname,$id);
        
    }else if(isset($_POST["registration"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phonenum = $_POST["phonenum"];

        $items->addDelivery($name,$email,$phonenum);
        
    }else if($_GET["actiontype"] == 'deletedeli'){

        $deliid = $_GET["id"];

        $items->deleteDeli($deliid);
        
    }else if($_GET["actiontype"] == 'deletecat'){

        $catid = $_GET["id"];
        $items->deleteCategory($catid);
        
    }else if(isset($_POST[""])){
        
    }else if(isset($_POST[""])){
        
    }

?>