<?php

$servername = "localhost";
$username = "root";
$password ="Admin@123";
$db="Registration";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ".$conn->connect_error);
}
echo "Connected successfully";




?> 

<?php
include 'actioncrud.php';
// include 'connectcrud.php';



$sql = "SELECT id, fname, lname,email,dob,nationality,pdf FROM crud";
$result = $conn->query($sql);

$displayData='';

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $displayData.= "<tr><td>".$row["fname"]."</td><td>".$row["lname"]. "</td><td>".$row["email"]."</td><td> ".$row["dob"]."</td><td> ".$row["nationality"]."</td><td>".$row["pdf"]."</td><td><a href='update.php?id=".$row['id']."'><button>EDIT</button></a><a href='delete.php?id=".$row['id']."'><button>X</button></a></td>
    </tr>";
  }
 
} 

?>
<!DOCTYPE html>
<html>

<head>
    <style>
       table {
        width:40%;
       }
       
        h2 {
            /* text-align: center; */
            background-color: black;
            color:aqua;
            width:100%;
            padding:15px;
            padding-left:100px;
            
            /* margin-left:20px; */
        }

      

        .part1,
        .part2 ,.part3{
            display: flex;


        }

        input {
            padding: 10px;
            font-size: 20px;
            margin-right: 20px;
            border-color:aquamarine;
            /* margin-top:100px; */

        }

        .btn {
            width: 300px;
            padding: 10px;
            background-color: aqua;
            color: white;
            font-size: 25px;
            /* margin-top:50px; */
            color:black;
            cursor:pointer;
            /* margin-left:10px; */
        }

        .dat {
            width: 270px;
        }
        .error{
            color:red;
        }
        table{
            margin-top:50px;
            width:80%;
            
        }
        .container{
            display: flex;
            flex-direction: row;;
            border:1px solid red;
            height:80%;
            justify-content: space-evenly;
        }
  .tableclass{
    width:60%;
    margin-left:300px;
  }
  th{
    width:300px;
  }
  footer{
    background-color:black;
    color:white;
  }
  .btn2{
    padding:10px;
    font-weight:20px;
    font-size:20px;
    width:120px;
  }
  .btn2:hover{
    background-color: aqua;
    cursor:pointer;

  }

       
    </style>
</head>

<body>
    
        <div class="container">
        <form  method="POST">
            <div class="black">
                <h2>Dev Community</h2>
                <h1>Customer Data Entry Form</h1>

                <div class="part1">
                    <div><input type="text" name="fname" placeholder="Firstname">
                        <p class="error"><?php echo $ufname; ?></p><br>
                    </div>
                    <div><input type="text" name="lname" placeholder="Lastname">
                        <p class="error"><?php echo $ulname; ?></p><br>
                    </div>
                </div>
                <div class="part2">
                    <div> <input type="email" name="email" placeholder="Email">
                        <p class="error"><?php echo $uemail; ?></p><br>
                    </div>
                    <div>
                        <input type="date" name="dob" placeholder="Enter  DOB" width="200px" class="dat">
                        <p class="error"><?php echo $udate; ?></p><br>
                    </div>
                </div>
                <div class="part3">
                    <div><input type="text" name="nationality" id="" placeholder="Nationality">
                    <p class="error"><?php echo $unation; ?></p><br></div>
                </div>
                <div> <button class="btn" type="submit" name="submit">JOIN</button></div>
            </div>
           
            </form>






            <div class="tableclass">
            <table border="1px" >
                <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>dob</th>
                <th>Nationality</th>
                <th>pdf</th>
                <th>operations</th>
            
            </tr>
            <?php echo $displayData?>
                
            </table>
        </div>
            
        </div>
    
    </div>
    

    <footer>
    <h1>SUBSCRIBE TO OUR NEWSLETTER</h1>
    <form method="POST"> 
         <input type="text" placeholder="EMAIL" name="hello" class="foot"><?php echo $uemail1 ?>
        <button type="submit" class="btn2" name="subscribe">Submit</button>
    </form>
      
</footer>
</body>




</html>