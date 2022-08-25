<?php

// $query2= 'insert into crud(fname,lname,email,dob,nationality) values("'.$fname.'","'.$lname.'","'.$email.'","'.$dob.'","'.$nation.'");';
$query2= 'insert into crud(fname,lname,email,dob,nationality) values("'.$fname.'","'.$lname.'","'.$email.'","'.$dob.'","'.$nation.'");';


if ($conn->query($query2) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query2 . "<br>" . $conn->error;
  }
  $sql = "SELECT id, fname, lname,email,dob,nationality FROM crud";
$result = $conn->query($sql);

$displayData='';

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $displayData.= "<tr><td>".$row["fname"]."</td><td>".$row["lname"]. "</td><td>".$row["email"]."</td><td> ".$row["dob"]."</td><td> ".$row["nationality"]."</td><td><button>EDIT</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>X</button></td>
    </tr>";
  }
} else {
  echo "0 results";
}
  
  $conn->close();
 






?>
