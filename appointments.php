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

$sql = "SELECT AppointmentID, Type_ID, AppointmentType.Appt_Type, Doctor_Name, Appointment_Time, Appointment_Date, Appt_Patient_ID 
FROM Appointment
INNER JOIN AppointmentType ON Appointment.Type_ID = AppointmentType.Appt_Type_ID";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) 
{
    echo "<table>
  <tr>
    <th>ID</th>
    <th>Patient ID</th>
    <th>Appointment Type</th>
    <th>Doctor Name</th>
    <th>Appointment Date</th>
    <th>Appointment Time</th>
    <th></th>
  </tr>";
    // output data of each row
    while($row = $result->fetch_assoc() ) 
    {
        $ID = $row["AppointmentID"];

        echo "<tr><td>" . $row["AppointmentID"] . 
          "</td><td>". $row["Appt_Patient_ID"] .
          "</td><td>". $row["Appt_Type"] .
          "</td><td>" . $row["Doctor_Name"] . 
          "</td><td>" . $row["Appointment_Date"] . 
          "</td><td>" . $row["Appointment_Time"] .
          "</td><td onclick='deleteAppointment($ID)'> <button> DELETE </button> </td><tr>";
    } 
    echo "</table>";

}
else{
  echo '<p>No Appointments at this time</p>';
}
$conn->close();


?>

<script>
  function deleteAppointment(id)
  {
    var data = new FormData();
    data.append('AppointmentID', id);
    const Http = new XMLHttpRequest();
    const url='deleteappointment.php';
    Http.open("POST", url, true);
    Http.send(data);
  }
</script>
