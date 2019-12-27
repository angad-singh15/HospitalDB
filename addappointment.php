<?php

// Select Patients
// Get ID

require 'dbcheck.inc.php';

$sql = "SELECT PatientID, First, Last FROM patient";
$patients = $conn->query($sql);

$sql = "SELECT DoctorID, First, Last FROM doctor";
$doctors = $conn->query($sql);

$sql = "SELECT Appt_Type, Appt_Type_ID FROM AppointmentType";
$appointmentTypes = $conn->query($sql);

?>


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

<h1>Add New Appointment<h1>

<form action="insertappointment.php" method="POST">
  <table>
  
  
   <tr>
    <td>Patient ID :</td>

    <td>
      <select name="PatientID" required>
        <?php
            while ($rows = $patients->fetch_assoc()) {
               $patientID = $rows['PatientID'];
               $fname = $rows['First'];
               $lname = $rows['Last'];
               echo "<option value='$patientID'>$fname $lname</option>";
            }
        ?>
      </select>
    </td>
    
  </tr>
   

   <tr>
    <td>Date of Appointment :</td>
    <td><input type="date" name="AppointmentDate" required></td>
   </tr>
   <tr>
   
   
    <td>Time :</td>
    <td><input type="time" name="AppointmentTime" required></td>
   </tr>   
   <tr>
  
    <td>Doctor's Name :</td>
    <td>
      <select name="DoctorName" required>
        <?php
            while ($rows = $doctors->fetch_assoc()) {
               $name = "Dr. ". $rows['First']." " . $rows['Last'];
               echo "<option value='$name'>$name</option>";
            }
        ?>
      </select>
    </td>

   </tr>

   <tr>
    <td>Appointment Type :</td>
    <td>
      <select name="AppointmentTypeID" required>
        <?php
            while ($rows = $appointmentTypes->fetch_assoc()) {
               $name = $rows['Appt_Type'];
               $ID = $rows['Appt_Type_ID'];
               echo "<option value='$ID'>$name</option>";
            }
        ?>
      </select>
    </td>
   </tr>


   <tr>
   
    <td><input type="submit" value="submit"></td>
   </tr>
  </table>
 </form>