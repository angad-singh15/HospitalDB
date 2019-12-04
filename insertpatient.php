<?php
@$PatientID = $_POST['PatientID'];
@$First = $_POST['First'];
@$Last = $_POST['Last'];
@$SSN = $_POST['SSN'];
@$Gender = $_POST['Gender'];
@$Phone = $_POST['Phone'];
@$Street = $_POST['Street'];
@$City = $_POST['City'];
@$State = $_POST['State'];
@$ZipCode = $_POST['ZipCode'];
@$Date_Of_Birth = $_POST['Date_Of_Birth'];
@$Dept_ID = $_POST['Dept_ID'];

if (!empty($PatientID) || !empty($First) || !empty($Last) || !empty($SSN) || !empty($Gender) || !empty($Phone)|| !empty($Street)|| !empty($City)|| !empty($State)|| !empty($ZipCode)
	|| !empty($Date_Of_Birth)|| !empty($Dept_ID)){
		
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "hospital";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
		
     $SELECT = "SELECT PatientID From patient Where PatientID = ? Limit 1";
     $INSERT = "INSERT Into patient (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID ) values('$PatientID'?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $PatientID);
     $stmt->execute();
     $stmt->bind_result($PatientID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("issisisssisi", $PatientID, $First, $Last, $SSN, $Gender, $Phone, $Street, $City, $State, $ZipCode, $Date_Of_Birth, $Dept_ID);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "There is already a user with this ID";
     }
     $stmt->close();
     $conn->close();
    }
} else {
	echo "All field are required";
 die();
}

?>