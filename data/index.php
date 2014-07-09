<?php
require "db.php";

function getlog(){
    	$request = file_get_contents('php://input');
    	return json_decode($request,true); 
	}
$getlog    = getlog();



if (isset($_POST)) {
     
    
    if (!empty( $getlog['username']) && !empty($getlog['username'] )) {
    	
    	//echo json_encode($data);
        $username = $getlog['username'];
        $password =  $getlog['password'];

        $database = new Db();
        $database->query("SELECT * FROM users WHERE name	 = :username && password = :password ");

        $database->bind(':username', $username, PDO::PARAM_STR);
        $database->bind(':password', $password, PDO::PARAM_STR);

        //$database->execute();
        $rows = $database->resultset();
        
        $n = $database->rowCount();
        $row = $database->single();
          if ($n == 1) {
             session_start();

        	echo $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;


           }else{


    	    echo "LOGIN ERROR";
        }
       

        }


   }else{

    echo "FALSE";
   	return false;
  


   }



?>