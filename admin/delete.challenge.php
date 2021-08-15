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
         
        $sql = "SELECT * FROM `challenges_by_users` WHERE `id`=$chal_id ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['id'];           
            $languages = $row['language'];
            $level = $row['level'];            
            $heading = $row['title'];
            $desc = $row['chal_desc'];
            $live_url = $row['live_url'];
            $code_url = $row['code_url'];
            $challenged_by = $row['challenged_by'];	
            $file = $row['user_file'];
        }


        $sql4 =  " DELETE FROM `challenges_by_users` WHERE `id`= '$chal_id' ;";
        $result4 = mysqli_query($conn, $sql4);

        if($result4){  
            $dir = "../users_challenges/$heading";

            $result_del = deleteDirectory($dir);           
            if($result_del){
                header("Location: users.challenges.php?Challenge_deleted=true"); 
            }
            else{
                echo"not able to delete";
            }   
        }
        else{
            echo'Error';
        }    
}



?>