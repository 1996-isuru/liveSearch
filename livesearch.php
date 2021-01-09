<?php
 
  header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
  echo '<response>';

  //get the q parameter from URL
  $q=$_GET["q"];

  $name = $_GET['q'];

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'starfest';

  $connection = mysqli_connect('localhost', 'root', '', 'starfest');

  if(mysqli_connect_error()){
      die('Database connection faild' . $connection->connect_error);
  } 
  if($name == ''){
    echo (" ");
  }
  
  else {

      //lookup all links from the xml file if length of q>0

      $sql = "SELECT email FROM user WHERE email LIKE '$name%'";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<a href='#'>".$row["email"]."</a>";
            echo "<br>";
        }
      }
    }

  echo '</response>';
  $connection->close();
?>