<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Local Hospital</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['submit']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "patient";
    
    // get values form input text and number

	$PatientID = $_POST['PatientID'];
	$First = $_POST['First'];
	$Last = $_POST['Last'];
	$SSN = $_POST['SSN'];
	$Gender = $_POST['Gender'];
	$Phone = $_POST['Phone'];
	$Street = $_POST['Street'];
	$City = $_POST['City'];
	$State = $_POST['State'];
	$ZipCode = $_POST['ZipCode'];
	$Date_Of_Birth = $_POST['Date_Of_Birth'];
	$Dept_ID = $_POST['Dept_ID'];
		
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "NSERT Into patient (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID ) 
	values('$PatientID','$First','$Last','$SSN','$Gender','$Phone,'$Street','$City','$State','$ZipCode','$Date_Of_Birth','$Dept_ID')";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
}

?>

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
        <a class="navbar-brand" href="index.php">Local<span>Hospital</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="addpatient.php">Add Patient</a></li>
          <li><a href="availabledoctors.php">Available Doctors</a></li>
          <li><a href="appointments.php">Appointments</a></li>
		  <li><a href="addappointment.php">Add Appointment</a></li>
        </ul>
      </div>
    </div>
  </nav>

<br>
<br>
<br>

<h1>Add New Patient<h1>

<form action="addpatient.php" method="POST">
  <table>
  
  
   <tr>
    <td>Patient ID :</td>
    <td><p id="PatientID"</p></td>
   </tr>
   
   
   <tr>
    <td>First Name :</td>
    <td><input type="text" name="First" required></td>
   </tr>
   
   
   <tr>
    <td>Last Name :</td>
    <td><input type="text" name="Last" required></td>
   </tr>
   <tr>
   
   
   <tr>
    <td>Date of Birth :</td>
    <td><input type="date" name="Date_Of_Birth" required></td>
   </tr>
   <tr>
   
   
    <td>SSN:</td>
    <td><input type="number" name="SSN" required></td>
   </tr>   
   <tr>
   
   
    <td>Gender :</td>
    <td>
     <input type="radio" name="Gender" value="m" required>Male
     <input type="radio" name="Gender" value="f" required>Female
    </td>
   </tr>
   <tr>
   
   
    <td>Phone Number :</td>
    <td><input type="number" name="Phone" required></td>
   </tr>
   <tr>
    <td>Street :</td>
    <td><input type="text" name="Street" required></td>
   </tr>
   
   
   <tr>
    <td>City :</td>
    <td><input type="text" name="City" required></td>
   </tr>
   <tr>
    <td>State :</td>
    <td>
     <select name="State" required>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
     </select>
    </td>
   </tr>


   <tr>
    <td>ZIP Code :</td>
    <td><input type="number" name="ZipCode" required></td>
   </tr> 
   
   <tr>
    <td>Dept ID :</td>
    <td>
     <select name="Dept_ID" required>
      <option selected hidden value="deptid">Select Code</option>
      <option value="1">ID 1 Info</option>
      <option value="2">ID 2 Info</option>
      <option value="3">ID 3 Info</option>
      <option value="4">ID 4 Info</option>
      <option value="5">ID 5 Info</option>
      <option value="6">ID 6 Info</option>
     </select>
    </td>
   </tr>
 
   
    <td><input type="submit" value="submit"></td>
   </tr>
  </table>
 </form>



<script>
document.getElementById("PatientID").innerHTML =
Math.floor(Math.random() * 999999);
</script>


<body>
</head>