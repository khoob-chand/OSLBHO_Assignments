<?php 



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
        }
        a:hover{
            color:purple;
        }
      </style>
    </head>
    <body>
    <h2>Dev Community     <a href="logout.php" >Logout</a></h2>
    <div class=con>
    <?php 
session_start();
 echo '<h1>Hi   '.$_SESSION['username'].'</h1>';



?> Welcome to login page !!!!


    </div>
    <footer>
    <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
        <input type="text" placeholder="EMAIL">
        <button type="submit">Submit</button>
</footer>

    </body>
</html>




