<?php 
session_start();


?>


<html>
    <head>
      <style>
        h2{
            background-color: black;
            color:white;
            padding:10px;
        
            
        }
        footer{
            background-color: black;
            
        }
        input ,button{
            padding:10px;
            font-size:20px;
            border-color:aqua;
        }
        button{
            width:100px;
            font-size:20px;
        }
        .con{
            height:80%;
            color:aquamarine;
            font-size:30px;
            text-align: center;
            
        }
        a{
            margin-left:70%;
            text-decoration: none;
            color:white;
            font-size:20px;

        }
        a:hover{
            color:blueviolet
        }
      </style>
    </head>
    <body>
    <h2>Dev Community <a href="login.php">Login</a></h2>
    <div class=con>
        Logout Successfully!!!! <br><?php 
         echo '<h1>'.$_SESSION['username'].'</h1>';
        ?>

    </div>
    <footer>
    <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
        <input type="text" placeholder="EMAIL">
        <button type="submit">Login Now</button>
</footer>

    </body>
</html>




<?php 
session_unset();
session_destroy();
echo '<h1>'.$_SESSION['username'].'</h1>'; 

?>