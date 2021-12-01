<?php
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '../partials/dbconnect.php';       
        
        $chal_id = $_POST['User_challenge_id'];

        echo $chal_id;
         
        $sql = "SELECT * FROM `challenges` WHERE `challenge_id`= '$chal_id' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['challenge_id'];
            $image = $row['image'];
            $languages = $row['languages'];
            $level = $row['level'];
            $heading = $row['challenge_heading'];
            $desc = $row['challenge_desc'];
            
        }


        $sql4 =  " DELETE FROM `challenges` WHERE `challenge_id`= '$chal_id' ;";
        $result4 = mysqli_query($conn, $sql4);   
        

        if($result4){

            $sql5 =  " DELETE FROM `threads` WHERE `thread_cat_id`= '$chal_id' ;";
            $result5 = mysqli_query($conn, $sql5);      

            if($result5){ 

                $sql6 =  " DELETE FROM `users_challenges` WHERE `challenge_id`= '$chal_id' ;";
                $result6 = mysqli_query($conn, $sql6);

                if($result6){  

                    $sql7 =  " DELETE FROM `comments` WHERE `cat_id`= '$chal_id' ;";
                    $result7 = mysqli_query($conn, $sql7);
    
                    if($result7){  

                        $dir = "../challenges/$heading";

                        $result_del = deleteDirectory($dir);           
                        if($result_del){
                            header("Location: admin.all.chal.php?Challenge_deleted=true"); 
                        }
                        else{
                            echo"not able to delete";
                        } 
                    }
                    else{
                        echo'not deleted from comments database';
                    }  
                }
                else{
                    echo'not deleted from users_challenges database';
                }
            }
            else{
                echo'not deleted from threads database';
            }
        }
        else{
            echo'Not deleted from challenges database';
        }    
}



?>