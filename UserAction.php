<?php

    require_once "classes/classUser.php";
    include "classes/classItems.php";

    $user = new user;
    $items = new items;

    if(isset($_POST["deleteitem"])){

        // カートの中から選ばれた商品だけを削除する
        $itemid = $_POST["itemid"];

        $items->deleteFromCart($itemid);

    }else if(isset($_POST["login"])){

        $uname = $_POST["username"];
        $pass = $_POST["password"];

        $user->userLogin($uname,$pass);

    }else if(isset($_POST["registration"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phonenum = $_POST["phonenum"];
        $address = $_POST["address"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user->userRegistration($name,$email,$phonenum,$address,$username,$password);

    }else if(isset($_POST["contact"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $contact = $_POST["review_form_text"];

        $user->AddContact($name,$email,$subject,$contact);
  
    }else if(isset($_POST["bag"])){
        $addbag = $_POST[""];

    }else if(isset($_POST["total_button"])){

        $loginid = $_POST["loginid"];
        
        $items->moveToPurchase($loginid);
        

    }else if(isset($_POST["updateuser"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phonenum = $_POST["pnum"];
        $address = $_POST["address"];
        $username = $_POST["uname"];
        $password = $_POST["pass"];
        $id = $_POST["id"];

        $user->updateUser($name,$email,$address,$phonenum,$username,$password,$id);


    }else if(isset($_POST["putitem"])){

        $loginid = $_POST["loginid"];
        $itemid = $_POST["itemid"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        
        $items->PutInTheCart($itemid,$quantity,$price,$loginid);

    }else if(isset($_POST["showpurchase"])){

            $date = $_POST["date"];
            
            $_SESSION["searchPurchase"] = $date;
            
            header("Location: purchase.php");

    }else if(isset($_POST[""])){

    }else if(isset($_POST[""])){

    }else if(isset($_POST[""])){

    }else if(isset($_POST[""])){

    }else if(isset($_POST[""])){

    }
?>

