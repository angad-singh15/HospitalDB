<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
require 'dbcheck.inc.php';
$AppointmentID = $_POST['AppointmentID'];

if (!empty($AppointmentID))
{
        $DELETE = "DELETE FROM Appointment WHERE AppointmentID = $AppointmentID";
     
        if(mysqli_query($conn, $DELETE)){
        echo "Records deleted successfully.";
        //header("Location: http://localhost:8888/hospital");

         exit();
        } 
        else
        {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
} 
else 
{
	echo "All field are required";
 die();
}

}
else
{
    $dir_path = "img/";
    $extensions_array = array('jpg','png','jpeg');
    
    if(is_dir($dir_path))
    {
        $files = scandir($dir_path);
        
        for($i = 0; $i < count($files); $i++)
        {
            if($files[$i] !='.' && $files[$i] !='..')
            {
                // get file name
                echo "Uh Oh. Looks like you're not suppose to be here, don't worry lets get you back to the home page
                <br>";
                
                // get file extension
                $file = pathinfo($files[$i]);
                $extension = $file['extension'];
                //echo "File Extension-> $extension<br>";
                
               // check file extension
                if(in_array($extension, $extensions_array))
                {
                // show image
                //echo "<img src='$dir_path$files[$i]' style='width:150px;height:225px;'><br>";
                echo "<a href='index.php'><img src='$dir_path$files[$i]' style='width:150px;height:225px;'><br>";
                }
            }
        }
    }
}
?>