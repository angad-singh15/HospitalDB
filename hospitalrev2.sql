CREATE SCHEMA Hospital;

USE Hospital;

CREATE TABLE Patient (
 PatientID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(30) NOT NULL,
 SSN INT(9) NOT NULL UNIQUE,
 Gender VARCHAR(1) NOT NULL,
 Phone VARCHAR(10) NOT NULL,
 Street VARCHAR(30) NOT NULL,
 City VARCHAR(30) NOT NULL,
 State VARCHAR(30) NOT NULL,
 ZipCode INT(5) NOT NULL,
 Date_Of_Birth DATE NOT NULL,
 Dept_ID INT NOT NULL,
 PRIMARY KEY (PatientID));



CREATE TABLE Doctor(
 DoctorID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(45) NOT NULL,
 SSN INT(9) NOT NULL UNIQUE,
 Gender VARCHAR(1) NOT NULL,
 DateOfBirth DATE NOT NULL,
 Start_Date Date NOT NULL,
 Patient_ID INT NOT NULL,
 Dept_ID INT NOT NULL,
 PRIMARY KEY (DoctorID));
 

 CREATE TABLE Nurse(
 NurseID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(45) NOT NULL,
 SSN INT(9) NOT NULL UNIQUE,
 Gender VARCHAR(10) NOT NULL,
 DateOfBirth DATE NOT NULL,
 Start_Date Date NOT NULL,
 Doc_ID INT NOT NULL,
 PRIMARY KEY (NurseID));



#mapping nurse_patient
CREATE TABLE Nurse_Patient(
 PatientID INT NOT NULL,
 NurseID INT NOT NULL,
 PRIMARY KEY (PatientID, NurseID));
 

 
 CREATE TABLE Department(
 DeptID INT NOT NULL,
 Dept_Name VARCHAR(30) NOT NULL UNIQUE,
 Capacity INT NOT NULL,
 PRIMARY KEY (DeptID));

 
CREATE TABLE Department_Nurse(
 DeptID INT NOT NULL,
 NurseID INT NOT NULL,
 PRIMARY KEY (DeptID, NurseID));
 


 CREATE TABLE Appointment(
 AppointmentID INT NOT NULL,
 Type_ID INT NOT NULL,
 Doctor_name VARCHAR(30) NOT NULL,
 Appointment_time TIME NOT NULL,
 Appointment_date DATE NOT NULL,
 Appt_Patient_ID INT NOT NULL,
 PRIMARY KEY (AppointmentID));


CREATE TABLE AppointmentType(
 Appt_Type VARCHAR(20) NOT NULL,
 Appt_Type_ID INT NOT NULL,
 PRIMARY KEY (Appt_Type_ID));

ALTER TABLE Nurse_Patient ADD CONSTRAINT FK_Nurse_Patient_ID FOREIGN KEY
(PatientID) REFERENCES Patient(PatientID);

ALTER TABLE Nurse_Patient ADD CONSTRAINT FK_Nurse_Nurse_ID FOREIGN KEY
(NurseID) REFERENCES Nurse(NurseID);
 
ALTER TABLE Nurse ADD CONSTRAINT FK_Doctor_ID FOREIGN KEY
(Doc_ID) REFERENCES Doctor(DoctorID);

ALTER TABLE Department_Nurse ADD CONSTRAINT FK_Dept_Dept_ID FOREIGN KEY
(DeptID) REFERENCES Department(DeptID);

ALTER TABLE Department_Nurse ADD CONSTRAINT FK_Dept_Nurse_ID FOREIGN KEY
(NurseID) REFERENCES Nurse(NurseID);

 ALTER TABLE Appointment ADD CONSTRAINT FK_APPT_ID FOREIGN KEY
(Appt_Patient_ID) REFERENCES Patient(PatientID);

ALTER TABLE Appointment ADD CONSTRAINT FK_APT_ID FOREIGN KEY
(Type_ID) REFERENCES AppointmentType(Appt_Type_ID);
 
 ALTER TABLE Patient ADD CONSTRAINT FK_Dept_ID FOREIGN KEY
(Dept_ID) REFERENCES Department(DeptID); 

#mapping doctor and patient 1:n
ALTER TABLE Doctor ADD CONSTRAINT FK_Patient_ID FOREIGN KEY
(Patient_ID) REFERENCES Patient(PatientID);

ALTER TABLE Doctor ADD CONSTRAINT FK_Dept_Doc_ID FOREIGN KEY
(Dept_ID) REFERENCES Department(DeptID);


INSERT INTO Department (DeptID, Dept_Name, Capacity) 
	VALUES (1, "Cancer",40),
		(2, "Cardiology",40),
		(3, "Neurology",40),
		(4, "Intensive Care",40),
		(5, "Emergency",40),
		(6, "Maternity",40);

 
INSERT INTO PATIENT (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID)
	VALUES
		(654321, "Jane", "Doe", 654321, "F", 0203945,"A","B","C",64081, '1997-04-25', 1),
		(654323, "Kate", "Steines", 654324, "F", 0203945,"A","B","C",64081, '1997-04-25', 1),
		(123444, "Craig", "Palms", 654343, "M", 0203945,"A","B","C",64081, '1997-04-25', 2),
		(125904, "Robert", "Marshall", 654393, "M", 0213945,"A","B","C",64081, '1997-05-27', 1);

INSERT INTO Doctor (DoctorID, First, Last, SSN, Gender, DateOfBirth, Start_Date, Patient_ID, Dept_ID) 
	VALUES 
		(123456, "John","Doe", 123456, "M", '1990-02-15', '2000-04-20',654321, 1 ),
		(123457, "Jim","Cline", 123457, "M", '1990-02-15', '2000-04-20',654323, 1 ),
		(123458, "Allen","Dorsheff", 1234557, "M", '1990-02-15', '2000-04-20',654323, 2 );
    
INSERT INTO AppointmentType(Appt_Type, Appt_Type_ID)
    VALUES ("Surgery",  1),
    ("Chemotherapy", 2),
    ("Blood Transfusion", 3),
    ("Lab Test", 4),
    ("Child Care", 5),
    ("Allergy", 6),
    ("Vaccine", 7),
    ("Physical Checkup", 8),
    ("General Checkup", 9),
    ("On-Watch", 10),
    ("Emergency", 11); 

    

