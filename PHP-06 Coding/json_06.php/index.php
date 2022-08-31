<?php 
include 'action.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            h2{
                text-align: center;
            }
            .black{
                /* border:1px solid red; */
                width:30%;
                margin:0px auto;
            }
            input{
                padding:10px;
                font-size:20px;
                /* margin-top:100px; */
                
            }
            .btn{
                width:350px;
                padding:15px;
                background-color: blueviolet;
                color:white;
                font-size:25px;
            }
            .dat{
                width:315px;
            }
            form{
                text-align: center;;
            }
           

        </style>
    </head>    
<body><form action="#" method="POST"><div class="container">
<div class="black">
    <h2>Dev Community</h2>

    <input type="text" name="fname" placeholder="Enter your name" ><p class="error"><?php echo $uname; ?></p><br>
    <input type="text" name="email" placeholder="Enter your email" ><p class="error"><?php echo $uemail; ?></p><br>
    <input type="number" name="phone" placeholder="Enter your mobile no."  ><p class="error"><?php echo $uphone; ?></p><br>
    <input type="date" name="dob" placeholder="Enter  DOB" width="200px" class="dat"> <p class="error"><?php echo $udate; ?></p><br>
    <button class="btn" type="submit" name="submit">JOIN</button>
</div>
</div></form>
    
</body>




</html>

