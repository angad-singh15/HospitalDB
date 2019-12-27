<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>North Star Hospital</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">North Star <span>Hospital</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="addpatient.php">Add Patient</a></li>
          <li><a href="availabledoctors.php">Available Doctors</a></li>
          <li><a href="appointments.php">Manage Appointments</a></li>
		  <li><a href="addappointment.php">Add Appointment</a></li>
        </ul>
      </div>
    </div>
  </nav>

<br>
<br>
<br>

<?php

require 'dbcheck.inc.php';

$sql = "SELECT PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID, Dept_Name
FROM patient
INNER JOIN department
Where Patient.Dept_ID = Department.DeptID";
$result = $conn->query($sql);


if ($result->num_rows > 0 ) {
    echo "<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>SSN</th>
		<th>Gender</th>
		<th>Phone Number</th>
		<th>Address</th>
		<th>Date of Birth</th>
		<th>Department</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc() ) {
        echo
         
        "<tr><td>".$row["PatientID"].
        "</td><td>". $row["First"] ," ". $row["Last"] .
        "</td><td>" . $row["SSN"] .
        "</td><td>" . $row["Gender"] .
        "</td><td>" . $row["Phone"] .
        "</td><td>". $row["Street"] ," ". $row["City"]," " .$row["State"] ," ".$row["ZipCode"].
        "</td><td>" . $row["Date_Of_Birth"] .
        "</td><td>" . $row["Dept_Name"] . 
        "</td><tr>";
      }
   echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<body>
</head>
