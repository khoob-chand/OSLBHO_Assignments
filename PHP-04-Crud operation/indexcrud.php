<?php
include 'actioncrud.php';
// include 'connectcrud.php';

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
        }
        .container{
            display: flex;
        }
   

       
    </style>
</head>

<body>
    
        <div class="container">
        <form action="#" method="POST">
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







            
        </div>
        <div class="tableclass">
            <table border="1px" >
                <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>dob</th>
                <th>Nationality</th>
            
            </tr>
            <?php echo $displayData?>
                
            </table>
        </div>
    </div>
    


</body>




</html>