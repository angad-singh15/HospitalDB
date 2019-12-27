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

<h1>Add New Patient<h1>

<form action="insertpatient.php" method="POST">
  <table>
  
  
   <tr>
    <td>Patient ID :</td>
    <td><input id = "PatientID" type="int" name="PatientID" required></td>
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
     <input type="radio" name="Gender" value="M" required>Male
     <input type="radio" name="Gender" value="F" required>Female
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
      <option selected hidden value="deptid">Select Department</option>
      <option value="1">Cancer</option>
      <option value="2">Cardiology</option>
      <option value="3">Neurology</option>
      <option value="4">Intensive Care</option>
      <option value="5">Emergency</option>
      <option value="6">Maternity</option>
     </select>
    </td>
   </tr>
 
   
    <td><input type="submit" value="submit"></td>
   </tr>
  </table>
 </form>



<script>
document.getElementById("PatientID").value =
Math.floor(Math.random() * 999999);
</script>


<body>
</head>