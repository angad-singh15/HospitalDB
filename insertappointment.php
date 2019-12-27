<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
require 'dbcheck.inc.php';
$PatientID = $_POST['PatientID'];
$AppointmentID = rand(1, 99999);
$DoctorName = $_POST['DoctorName'];
$AppointmentTime = $_POST['AppointmentTime'];
$AppointmentDate = $_POST['AppointmentDate'];
$AppointmentTypeID = $_POST['AppointmentTypeID'];
// TODO: add appointment type

if (!empty($PatientID) || !empty($AppointmentID) || !empty($DoctorName) || !empty($AppointmentTime || !empty($AppointmentDate)) || !empty($AppointmentTypeID)){

     $INSERT = "INSERT Into Appointment 
     (AppointmentID, Type_ID, Doctor_name, Appointment_time, Appointment_date, Appt_Patient_ID) 
     values('$AppointmentID', '$AppointmentTypeID', '$DoctorName', '$AppointmentTime', '$AppointmentDate', '$PatientID')";
    
     
     if(mysqli_query($conn, $INSERT)){
         echo "Appointment added successfully.";
         header( "refresh:3;url=appointments.php" );
         exit();
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }
    
} else {
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