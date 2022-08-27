<?php 
include 'loginaction.php';



?><?php 



?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            h2{
                /* text-align: center; */
                background-color: black;
                padding:15px;
                color:white;
                
            }
            h1{
                color:white;
              
            }
            .black{
                /* border:1px solid red; */
                width:20%;
                /* margin:0px auto; */
                margin-top:100px;
                margin-left:0px;
                height:100%;
            }
            input{
                padding:10px;
                font-size:20px;
                border-color:aquamarine;
                /* margin-top:100px; */
                
            }
            .btn{
                width:310px;
                padding:10px;
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
            footer{
                background-color:black;
            }
            .foot{
                border-color:aqua;
            }
            .btn2{
                padding:10px;
                width:150px;
                font-size:20px;
            }
            p{
                font-size: 30px;
                color:aqua;
                font-weight: bold;;
            }
            .error{
                color:red;
                font-size:20px;
            }
            footer{
                margin-top:15%;
            }
           
        
           

        </style>
    </head>    
<body>
<h2>Dev Community</h2>
<form action="#" method="POST"><div class="container">

<div class="black">
   
<P>LOGIN </P>
    <input type="text" name="fname" placeholder="Enter your email" ><p class="error"><?php echo $uemail; ?></p><br>
    <input type="text" name="password" placeholder="Enter your password" ><p class="error"><?php echo $udate; ?></p><br>
    
    <button class="btn" type="submit" name="submit">JOIN</button>
</div>
</div>
</form>
<footer>
    <h1>SUBSCRIBE TO OUR NEWSLETTER</h1>
        <input type="text" placeholder="EMAIL" class="foot">
        <button type="submit" class="btn2">Submit</button>
</footer>
    
</body>




</html>

