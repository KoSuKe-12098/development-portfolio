<?php
session_start();

require_once "connection.php";

class user extends Database{

  
    // ユーザー情報を登録する機能
    public function userRegistration($name,$email,$phonenum,$address,$username,$password){


        $sql = "INSERT INTO login(username,password) VALUES('$username','$password')";

        if($this->conn->query($sql) == TRUE){
            $id = mysqli_insert_id($this->conn);

            $sql2 = "INSERT INTO user(name,email,phonenum,address,loginid)
                VALUES('$name','$email','$phonenum','$address','$id')";

        if($this->conn->query($sql2) == TRUE){
            header("Location: login.php");
        }else{
            echo "Error in inserting to USER TABLE. " .$this->conn->error;
        }
        }else{
        echo "Error in inserting to LOGIN TABLE. " .$this->conn->error;
        }
    }


    // ユーザーがログインする機能
    public function userLogin($uname,$pass){

        $sql = "SELECT * FROM login WHERE username = '$uname' AND password = '$pass'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){

            $row =  $result->fetch_assoc();

            $_SESSION["loginid"] = $row["loginid"];

            if($row["status"] == "A"){
                
                header("Location: admin.php");
            }else{
                header("Location: user.php");
            }

        }else{
            echo "Error in username and password. " .$this->conn->error;
        }
    }


    public function AddContact($name,$email,$subject,$contact){

        $sql = "INSERT INTO contact(name,email,comment,subject) VALUES ('$name','$email','$contact','$subject')";

        if($this->conn->query($sql) == TRUE){

            echo "Thank you for massege.";
        }else{
            echo "Error in inserting to CONTACT TABLE. " .$this->conn->error;
        }
    }


    public function specificSearchUser($id){

        $sql = "SELECT * FROM user INNER JOIN login ON user.loginid =login.loginid
        WHERE user.loginid = '$id'";

        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }

        return $rows;
    }



    public function updateUser($name,$email,$address,$phonenum,$username,$password,$id){

        $sql = "UPDATE user INNER JOIN login ON user.loginid = login.loginid
                SET user.name = '$name',
                    user.email = '$email',
                    user.address = '$address',
                    user.phonenum = '$phonenum',
                    login.username = '$username',
                    login.password = '$password'
                    WHERE user.loginid = '$id'";

                if($this->conn->query($sql)){
                    header("Location: user.php");
                }else{
                    echo "Error in updating ".$this->conn->error;
                }
    }



    






}


?>
