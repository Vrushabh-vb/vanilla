<?php 
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "ecom";

        $conn = mysqli_connect($server,$username,$password,$database);

        if(!$conn){
        //     echo "Success";
        // }
        // else{
            die("error".mysqli_connect_errno());
        }

        // function redirect($url, $permanent = false) {

        //     header('Location: ' . $url , true, $permanent ? 301: 302);
        //     exit();

        // }
        
        
            
      
?>