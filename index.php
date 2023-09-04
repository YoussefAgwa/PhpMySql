<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
</head>
<body>
  <form method="post">
    <input type="text" name="bookName" placeholder="Write Your Book Name">
    <input type="number" min="0" name="bookPrice" placeholder="Price">
    <input type="text" name="bookAuth" placeholder="Write Author Name">
    <input type="submit" value="Save">
  </form>
</body>
</html>
<?php
    $bookName = $_REQUEST["bookName"];
    $bookPrice = $_REQUEST["bookPrice"];
    $bookAuth = $_REQUEST["bookAuth"];

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbName = "test";

  $connection = mysqli_connect($hostname, $username ,$password, $dbName);

  if(!$connection) {
    echo "Connection Failed";
  }
    $bookInfo = "INSERT INTO booktable(BookName , BookPrice	, BookAuthor) 
    VALUES('$bookName',$bookPrice,'$bookAuth')";
    mysqli_query($connection ,$bookInfo);
    
  $sql = "SELECT * FROM booktable";
  $result = mysqli_query($connection , $sql);
  if(mysqli_num_rows($result) > 1) {
    while($book = mysqli_fetch_assoc($result)) {
      echo "<h3> {$book['BookName']}<h3>";
      echo "<h4> {$book['BookPrice']}<h3>";
      echo "<h4> {$book['BookAuthor']}<h3>";
    }
  }
?>
