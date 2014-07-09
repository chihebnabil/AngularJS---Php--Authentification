<?php
require "db.php";



function getlog(){
        $request = file_get_contents('php://input');
        return json_decode($request,true); 
    }
$getlog    = getlog();

if (isset($_POST)) {
    

        $username = $getlog['username'];
                $id = $getlog['id'];
    	

        $database = new Db();

        $database->query("SELECT * FROM messages WHERE from_user_id   = :id  Order by id DESC");

        $database->bind(':id', $id);

        $rows = $database->resultset();
        
        $row = $database->single();
            
         echo(json_encode($rows));


        

   }else{

    echo "FALSE";
   	return false;
  


   }



?>