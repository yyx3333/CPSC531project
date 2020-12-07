<?php
session_start();
if (isset($_SESSION['uId'])) {
    $uid = $_SESSION['uId'];
  }
require 'includes/dbh.inc.php';

try { 

    if (isset($_POST['pid'])){
        $pid=$_POST['pid'];
        $query2 = "SELECT * FROM likes where u_id=$uid and p_id=$pid";
        $result2 = $conn->query($query2);
        if($result2->num_rows > 0){
            $query3 = "DELETE FROM likes  where u_id=$uid and p_id=$pid";
            $result3 = $conn->query($query3);
            if($result3){
                $query4="UPDATE posts SET p_likes=p_likes-1 Where p_id=$pid";
                $result4 = $conn->query($query4);
            }
        }
    
        else{

        $query = "INSERT INTO likes (u_id, p_id ) VALUES ('$uid', '$pid')";
        $result = mysqli_query($conn,$query);
        $msg=mysqli_error($conn);
         
        if($result){
         $query5="UPDATE posts SET p_likes=p_likes+1 Where p_id=$pid";
         $result5 = $conn->query($query5);        
         exit;
        }

        
          
        }
        exit();
        mysqli_close($conn);
        
        }
    

    


} catch(Exception $e) {

}
