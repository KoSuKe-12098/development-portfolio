<?php
    $id = $_GET["id"];
    require_once "classes/classUser.php";

    $user = new user;
    $result = $user->specificSearchUser($id);
   


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UpdateUser</title>
</head>
<body>
    <form action="UserAction.php" method="post">
        <?php foreach($result as $row){

        echo    
                "Name 
                    <input type='text' name='name' value='".$row["name"]."'><br>
                Email 
                    <input type='text' name='email' value='".$row["email"]."'><br>
                Address 
                    <input type='text' name='address' value='".$row["address"]."'><br>
                Phone Number 
                    <input type='number' name='pnum' value='".$row['phonenum']."'><br>
                Username 
                    <input type='text' name='uname' value='".$row['username']."'><br>
                password
                    <input type='password' name='pass' value='".$row['password']."'><br>";
            
        }
        echo       "<input type='hidden' name='id' value='".$id."'>";
        echo       "<input type='submit' name='updateuser' value='Update'>";
        ?>
    </form>
</body>
</html>