<?php
require "db.php";
session_start();





//echo rand(0, 15);

function getlog(){
    	$request = file_get_contents('php://input');
    	return json_decode($request,true); 
	}
$getlog    = getlog();



if (isset($_POST)) {
     
    
    if (!empty( $getlog['message'])  ) {
    	
    	//echo json_encode($data);
        
		$message = $getlog['message'] ;
        
		$id_from = $getlog['id'];

        $database = new Db();

            
           
      
        /*****/

        $database->query("SELECT id FROM users ");
        $rows = $database->resultset();
        $n= $database->rowCount();
            rand(0, $n);


        /*****/

        $database->query('INSERT INTO messages ( from_user_id , body,to_user_id,created) VALUES (:id_from, :message,:to,:created)');
        $database->bind(':message', $message );
        $database->bind(':id_from', $id_from);
        $database->bind(':to', rand(1, $n));
        $database->bind(':created', date('Y-m-d'));
        $database->execute(); 


         echo "TRUE";







        /***/
        


               

        

    } 
   }else{

    echo "FALSE";
   	return false;
  


   }



?>