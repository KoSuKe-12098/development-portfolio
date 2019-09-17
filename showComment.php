<?php

    require_once "classes/classItems.php";


    $items = new items;
    $result2 = $items->getContact();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
        <!-- 客からのコメントを表示する機能 -->

        <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
<?php 

    foreach($result2 as $row){
        
    
        echo "<tr>";
        echo "<th scope='row'>".$row["formid"]."</th>";
        echo "<td>".$row["name"]."</td>";
        echo  "<td>".$row["email"]."</td>";
        echo  "<td>".$row["subject"]."</td>";
        echo  "<td>".$row["comment"]."</td>";
        echo "</tr>";

    }

?>
  </tbody>
</table>
</div>
</body>
</html>
