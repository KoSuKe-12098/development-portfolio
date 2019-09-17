<?php
   
    require_once "connection.php";
    


    class items extends Database{

            public function AddItem($name,$price,$stock,$color,$size,$comment,$serialnum,$image,$catid){

                $target_dir = "images/";
                $target_file = $target_dir.basename($_FILES["image"]["name"]);

                $sql = "INSERT INTO items(itemname,itemprice,itemstock,itemcolor,itemsize,itemcomment,serialnum,itemimage,catid)VALUES('$name','$price','$stock','$color','$size','$comment','$serialnum','$image','$catid')";

                if($this->conn->query($sql) == TRUE){

                    header("Location: admin.php");
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
                }else{
                        echo "Error inserting items teble.".$this->conn->error;
                }
            }

            public function getCategory(){
            
                $sql = "SELECT * FROM category ";
    
                $result = $this->conn->query($sql);
                $rows = array();
    
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }


            public function AddCategory($catname,$size){

                $sql = "INSERT INTO category(catname,size) VALUES('$catname','$size')";

                if($this->conn->query($sql) == TRUE){

                        header("Location: admin.php");
                    }else{
                        echo "Error in inserting to CATEGORY TABLE. " .$this->conn->error;
                    }
            }


            public function getContact(){
                $sql = "SELECT * FROM contact";

                $result = $this->conn->query($sql);
                $rows = array();
    
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }


            public function specificSearchComment($id){
            
                $sql = "SELECT * FROM contact WHERE formid = '$id'";
               
                $result = $this->conn->query($sql);
    
                $row = $result->fetch_assoc();
            
                return $row;
            }


            public function getItemInfo(){

                $sql = "SELECT * FROM items ";

                $result = $this->conn->query($sql);
                $rows = array();
            
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
        
                }
                return $rows;

            }



            public function specificSearchItem($id){

                $sql = "SELECT * FROM items WHERE itemid = '$id' ";

                $result = $this->conn->query($sql);
                $rows = array();

                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                
                return $rows;
                
            }


            public function updateItems($iname,$iprice,$istock,$icolor,$isize,$icomment,$image,$serialnum,$itemid){

                $target_dir = "images/";
                $target_file = $target_dir.basename($_FILES["image"]["name"]);

                $sql = "UPDATE items 
                        SET items.itemname = '$iname',
                            items.itemprice = '$iprice',
                            items.itemstock = '$istock',
                            items.itemcolor = '$icolor',
                            items.itemsize = '$isize',
                            items.itemcomment = '$icomment',
                            items.itemimage = '$image',
                            items.serialnum = '$serialnum'
                            WHERE itemid = '$itemid'
                            ";
                        if($this->conn->query($sql)){
                            header("Location: admin.php");

                            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);

                        }else{
                            echo "Error in updating ".$this->conn->error;
                        }                        
            }

            public function deleteItem($itemid){
                
                $sql = "DELETE FROM items WHERE itemid = '$itemid'";

                if($this->conn->query($sql) == TRUE){
                    header("Location: admin.php");
                }else{
                    echo "Error in deleting the record. ".$this->conn->error;
                }
            }




            public function updateCategory($catname,$id){

                $sql = "UPDATE category
                        SET category.catname = '$catname'
                        WHERE catid = '$id'";

                if($this->conn->query($sql)){

                    header("Location: admin.php");

                }else{
                    echo "Error in updating ".$this->conn->error;
                }                        
            }


            public function addDelivery($name,$email,$phonenum){

                $sql = "INSERT INTO delivery(deliname,deliemail,deliphonenum) VALUES('$name','$email','$phonenum')"; 

                if($this->conn->query($sql) == TRUE){

                    header("Location: admin.php");
                   
                }else{
                        echo "Error inserting delivery teble.".$this->conn->error;
                }
            }


        




            public function deleteCategory($catid){

                $sql = "DELETE FROM category WHERE catid = '$catid'";

                if($this->conn->query($sql) == TRUE){
                    header("Location: admin.php");
                }else{
                    echo "Error in deleting the record. ".$this->conn->error;
                }
            }

            public function PutInTheCart($itemid,$quantity,$price,$loginid){

                    $sql = "SELECT * FROM items WHERE itemid = '$itemid'";
                    $result = $this->conn->query($sql);
                
                    $row = $result->fetch_assoc();

                    $total = $row["itemstock"] - $quantity;

                    if($total > 0){

                        $sql2 = "INSERT INTO cart(cartprice,cartquantity,itemid,loginid) 
                            VALUES('$price','$quantity','$itemid','$loginid')";
                            $this->conn->query($sql2);

                        $sql3 = "UPDATE items 
                            SET itemstock = itemstock - '$quantity' 
                            WHERE itemid = '$itemid'";
                            $this->conn->query($sql3);

                        header("Location:cart.php");

                    }else{
                        echo "Sorry This item already sold out. ".$this->conn->error;

                        $sql4 = "UPDATE items 
                            SET status = 'N'
                            WHERE itemid = '$itemid'";    
                            $this->conn->query($sql4); 
                    }
            }

            


            public function getCartInfo($loginid){


                $sql = "SELECT * FROM cart INNER JOIN items on cart.itemid = items.itemid
                WHERE cart.loginid = '$loginid'";

                $result = $this->conn->query($sql);

                    $rows = array();
            
                while($row = $result->fetch_assoc()){

                    if($row["cartstatus"] == "C"){

                        $rows[] = $row;
                    }
                
                }
                

                return $rows;
               

            }



            public function specificComputeItem($quantity,$price){
                
                $total = $quantity * $price;
                
                return  $total;

            }




            public function deleteFromCart($itemid){

                $sql = "DELETE FROM cart WHERE itemid = '$itemid'";

                if($this->conn->query($sql) == TRUE){
                    header("Location: cart.php");
                }else{
                    echo "Error in deleting the record. ".$this->conn->error;
                }
            }


            public function getSubTotal($loginid){

                $sql = "SELECT * FROM cart WHERE loginid = '$loginid'";

                $result = $this->conn->query($sql);
                $rows = array();
                
                $total = 0;

                    while($row = $result->fetch_assoc()){

                        if($row["cartstatus"] == 'C'){
                            
                            $rows[] = $row;
                        }
                    
                    }
    
                
                    foreach($rows as $row){

                        $total += $row["cartprice"] * $row["cartquantity"];

                    }   

                    return $total;
                
            }






            public function moveToPurchase($loginid){

                $result = $this->getCartInfo($loginid);

                    foreach($result as $row){

                        $itemname = $row["itemname"];
                        $itemprice = $row["itemprice"];
                        $cartquantity = $row["cartquantity"];

                        $sql = "INSERT INTO purchase(purchaseitemname,purchasePrice,purchaseitemquantity,purchaseDate,loginid) 
                                VALUES('$itemname','$itemprice','$cartquantity',CURDATE(),'$loginid')";
                                
                                if($this->conn->query($sql) == TRUE){
                                    
                                    

                                 }else{

                                    echo "Error in inserting the record. ".$this->conn->error;

                                 }

                    }

                    $this->ChangeSpecificCart($loginid);
                    

                
                    

            }



            public function ChangeSpecificCart($loginid){

                $sql2 = "UPDATE cart 
                    SET cart.cartstatus = 'P'
                    WHERE loginid = '$loginid'";

                     if($this->conn->query($sql2) == TRUE){
                        header("Location: AfterPurchase.php");
                     }else{
                        echo "Error in deleting the record. ".$this->conn->error;
                     }
            }


            public function getPurchase($loginid){

                $sql = "SELECT DISTINCT purchaseDate  FROM purchase WHERE loginid = '$loginid'";

                $result = $this->conn->query($sql);
                $rows = array();
            
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
    
                    

                }
                return $rows;
                
            }


            public function getDatePurchase($date,$id){


                $sql = "SELECT * FROM purchase WHERE loginid = '$id' AND purchaseDate = '$date'";

                $result = $this->conn->query($sql);
                $rows = array();
            
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
    
                }
                return $rows;
                


            }



            public function getCartQuantity($loginid){


                $sql = "SELECT * FROM cart WHERE loginid = '$loginid'";

                $result = $this->conn->query($sql);

                    $rows = array();
            
                    while($row = $result->fetch_assoc()){
                    
                        if($row["cartstatus"] == "C"){
                            
                            $rows[] = $row;
                        }
                
                    }

                    $quantity = 0;
                    $carttotal = 0;

                    foreach($rows as $row){
            
                        if($row["cartquantity"] > 1){

                            $quantity = $row["cartquantity"] - 1;

                            $carttotal += 1 + $quantity;

                        }else{

                            $carttotal += $row["cartquantity"];

                        }
                    }




                    return $carttotal;


            }





            public function getSize(){
            
                $sql = "SELECT * FROM size ";
    
                $result = $this->conn->query($sql);
                $rows = array();
    
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }



            public function specificSearch($id){

                $sql = "SELECT * FROM items WHERE catid = '$id' OR itemsize = '$id'";

                $result = $this->conn->query($sql);
                $rows = array();
    
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;

            }


    } 
?>

