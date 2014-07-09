<?php
require "db.php";

function getlog(){
    	$request = file_get_contents('php://input');
    	return json_decode($request,true); 
	}
$getlog    = getlog();



if (isset($_POST)) {
     
    
    if (!empty( $getlog['username']) && !empty($getlog['password'] )) {
    	
    	//echo json_encode($data);
        $username =  $getlog['username'];
        $password =  $getlog['password'];

        $database = new Db();

        $database->query("SELECT * FROM users WHERE name     = :username && password = :password");

        $database->bind(':username', $username, PDO::PARAM_STR);
        $database->bind(':password', $password, PDO::PARAM_STR);

        //$database->execute();
        $rows = $database->resultset();
        
        $n= $database->rowCount();
        $row = $database->single();
          if ($n == 1) {
            
            echo "FALSE";
           

           }else{

        $database->query('INSERT INTO users (name, password) VALUES (:username, :password)');
        $database->bind(':username', $username, PDO::PARAM_STR);
        $database->bind(':password', $password, PDO::PARAM_STR);

        $database->execute();        
            
         echo "TRUE";

            }






        /***/
        


               

        

    } 
   }else{

    echo "FALSE";
   	return false;
  


   }



?>