<?php

$query2= 'insert into signup values("'.$fname.'","'.$email.'","'.(integer)$phone.'","'.$dob.'");';

if ($conn->query($query2) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query2 . "<br>" . $conn->error;
  }
  
  $conn->close();
 






?>
<?php 
  header("Location:http://localhost/welcome.php");

?>