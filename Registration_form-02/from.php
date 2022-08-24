
<?php 
include 'formvalidate.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            h2{
                /* text-align: center; */
                /* margin-left: 100px;; */
                background-color: black;
                border-color: aquamarine;
                color:white;
                padding:10px;
                padding-left: 40px;;
            }
            .black{
              
                border:1px solid red;
                /* width:100%; */
                /* width:60%; */
                /* margin:0px auto; */
            }
            input{
                padding:10px;
                font-size:20px;
                margin-top:20px;
                border-color:aqua;
                margin-right:20px;
                
            }
            .btn{
                width:290px;
                padding:10px;
                background-color: blueviolet;
                color:white;
                font-size:25px;
                margin-top:10px;
            }
            .dat{
                width:260px;
            }
          
            .container{
                border:1px solid black;

            }
         a{
               text-decoration: none;
               margin-right:20px;
              text-align:end;
              margin-left:70%;;
              color:white;
            }
            .red{
                color:red;
                
            }
            .part1,.part1-3,.part3,.part4,.part5{
                display:flex;
                /* flex-direction: column; */
            }
            footer{
                background-color:black;

            }
            .email{
                padding:3px;
                margin-top:-20px;
            }
            .btn2{
                padding:7px;
                background-color: navajowhite;
                width:100px;
            }
           

        </style>
    </head>    
<body><form action="#" method="POST"><div class="container">
<div class="black">
    <h2>Dev Community  <a href="#" >Login</a></h2>
    <h1>Registration Page </h1>
    <div class="part1"> 
        <div class="part-1-2">
            <input type="text" name="fname" placeholder="First name" ><p class="red"><?php echo $fnameerr?></p>&nbsp&nbsp&nbsp&nbsp
        </div>
        <div>
            <input type="text" name="lname" placeholder="last name" ><p class="red"><?php echo $lnameerr?></p><br>
        </div>
    </div>

        
   <div class="part1-3">
    
   <div><input type="text" name="username" placeholder="username" ><p class="red"><?php echo $usernameerr?></p>&nbsp&nbsp&nbsp&nbsp</div>
   <div><input type="text" name="gender" placeholder="Gender" ><p class="red"> <?php echo $gendererr?></p><br></div> 
   

    </div>
    <div class="part3">
        <div> <input type="text" name="email" placeholder="Enter your email" ><p class="red"><?php echo $emailerr?></p>&nbsp&nbsp&nbsp&nbsp</div>
        <div><input type="number" name="phone" placeholder="Enter your mobile no."  ><p class="red"><?php echo $phoneerr?></p><br></div>
    </div>
    <div class="part4">
        <div><input type="date" name="dob" placeholder="Enter  DOB" class="dat"><p class="red"><?php echo $doberr?></p> &nbsp&nbsp&nbsp&nbsp</div>
        <div><input type="text" name="nationality" placeholder="Nationalty"><p class="red"><?php echo $nationalityerr?></p><br></div>
    </div>
    <div class="part5">
        <div>    <input type="text" name="profile" placeholder="profile Image"></div>
        <div>    <input type="file" name="upload" placeholder="Profile Image" width="200px" class="dat"><p class="red"><?php echo $uploaderr?></p><br></div>
    </div>

   
   
    
    
    



    

    <button class="btn" type="submit" name="submit">Submit Now</button>
</div>
</div></form>
<footer>
    <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
        <input type="text" placeholder="EMAIL" class="email">
        <button type="submit" class="btn2">Submit</button>
</footer>
    
</body>




</html>

