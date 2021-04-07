<?php
    $servername='';
    $username='';
    $db_password='';
    $dbname = "";
    $con=mysqli_connect($servername,$username,$db_password,"$dbname");
      if(!$con){
          die('Impossibile connettersi');
        }
    
    date_default_timezone_set('Europe/Rome');

    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>