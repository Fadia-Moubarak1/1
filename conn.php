<?php 

$DbHost = 'localhost';

$DbUser = 'english_assessment_db_user';

$DbPass = 'R@nU$er@3255';

$DbName = 'english_assessment_db';


// Create connection
 $conn = new mysqli($DbHost , $DbUser , $DbPass ,$DbName ) or die("Connect failed: %s\n". $conn -> error);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>