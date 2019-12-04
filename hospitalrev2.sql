CREATE SCHEMA Hospital;
USE Hospital;

CREATE TABLE Patient (
 PatientID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(30) NOT NULL,
 SSN INT(9) NOT NULL UNIQUE,
 Gender VARCHAR(10) NOT NULL,
 Phone INT NULL,
 Street VARCHAR(30) NOT NULL,
 City VARCHAR(30) NOT NULL,
 State VARCHAR(30) NOT NULL,
 ZipCode INT NOT NULL,
 Date_Of_Birth DATE NOT NULL,
 PRIMARY KEY (PatientID));

#For mapping of dept and patients (FK approach)
ALTER TABLE Patient ADD Dept_ID INT NOT NULL;
ALTER TABLE Patient ADD CONSTRAINT FK_Dept_ID FOREIGN KEY
(Dept_ID) REFERENCES Department(DeptID); 

CREATE TABLE Doctor(
 DoctorID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(45) NOT NULL,
 SSN INT(9) NOT NULL UNIQUE,
 Gender VARCHAR(10) NOT NULL,
 DateOfBirth DATE NOT NULL,
 Start_Date Date NOT NULL,
 PRIMARY KEY (DoctorID));
 
ALTER TABLE Doctor Add column  Patient_ID INT NOT NULL;
ALTER TABLE Doctor Add column  Dept_ID INT NOT NULL;
#mapping doctor and patient 1:n
ALTER TABLE Doctor ADD CONSTRAINT FK_Patient_ID FOREIGN KEY
(Patient_ID) REFERENCES Patient(PatientID);

ALTER TABLE Doctor ADD CONSTRAINT FK_Dept_Doc_ID FOREIGN KEY
(Dept_ID) REFERENCES Department(DeptID);

#Doctor Specialty
CREATE TABLE Doctor_Specialty(
 DoctorID INT NOT NULL,
 Specialty VARCHAR(45) NOT NULL,
 PRIMARY KEY (DoctorID,Specialty));
ALTER TABLE Doctor_Specialty ADD CONSTRAINT FK_Doctor_SpID FOREIGN KEY
(DoctorID) REFERENCES Doctor(DoctorID);
 
 CREATE TABLE Nurse(
 NurseID INT NOT NULL,
 First VARCHAR(30) NOT NULL,
 Last VARCHAR(45) NOT NULL,
 Specialty VARCHAR(20) NOT NULL,
 SSN INT NOT NULL UNIQUE,
 Gender VARCHAR(10) NOT NULL,
 DateOfBirth DATE NOT NULL,
 Start_Date Date NOT NULL,
 PRIMARY KEY (NurseID));
ALTER TABLE Nurse Add column Doc_ID INT NOT NULL;

ALTER TABLE Nurse ADD CONSTRAINT FK_Doctor_ID FOREIGN KEY
(Doc_ID) REFERENCES Doctor(DoctorID);

CREATE TABLE Nurse_Specialty(
 NurseID INT NOT NULL,
 Specialty VARCHAR(45) NOT NULL,
 PRIMARY KEY (NurseID,Specialty));
ALTER TABLE Nurse_Specialty ADD CONSTRAINT FK_Nurse_SpID FOREIGN KEY
(NurseID) REFERENCES Nurse(NurseID);

#mapping nurse_patient
CREATE TABLE Nurse_Patient(
 PatientID INT NOT NULL,
 NurseID INT NOT NULL,
 PRIMARY KEY (PatientID, NurseID));
ALTER TABLE Nurse_Patient ADD CONSTRAINT FK_Nurse_Patient_ID FOREIGN KEY
(PatientID) REFERENCES Patient(PatientID);
ALTER TABLE Nurse_Patient ADD CONSTRAINT FK_Nurse_Nurse_ID FOREIGN KEY
(NurseID) REFERENCES Nurse(NurseID);
 
 
 CREATE TABLE Department(
 DeptID INT NOT NULL,
 Dept_Name VARCHAR(30) NOT NULL UNIQUE,
 Capacity INT NOT NULL,
 PRIMARY KEY (DeptID));

 
CREATE TABLE Department_Nurse(
 DeptID INT NOT NULL,
 NurseID INT NOT NULL,
 PRIMARY KEY (DeptID, NurseID));
ALTER TABLE Department_Nurse ADD CONSTRAINT FK_Dept_Dept_ID FOREIGN KEY
(DeptID) REFERENCES Department(DeptID);
ALTER TABLE Department_Nurse ADD CONSTRAINT FK_Dept_Nurse_ID FOREIGN KEY
(NurseID) REFERENCES Nurse(NurseID);

 CREATE TABLE Appointment(
 Appt_Patient_ID INT NOT NULL,
 AppointmentID INT NOT NULL,
 Doctor_name VARCHAR(30) NOT NULL,
 Appointment_time TIME NOT NULL,
 Appointment_date DATE NOT NULL,
 PRIMARY KEY (AppointmentID));
 
ALTER TABLE Appointment ADD CONSTRAINT FK_APPT_ID FOREIGN KEY
(Appt_Patient_ID) REFERENCES Patient(PatientID);


CREATE TABLE AppointmentType(
 Appt_Type VARCHAR(20) NOT NULL,
 Appt_Type_ID INT NOT NULL,
 PRIMARY KEY (Appt_Type_ID));
 
 CREATE TABLE Appointment_ApptType(
 AppointmentID INT NOT NULL,
 Appt_Type_ID INT NOT NULL,
 PRIMARY KEY (Appt_Type_ID, AppointmentID));
ALTER TABLE Appointment_ApptType ADD CONSTRAINT FK_Appt_Appointment_ID FOREIGN KEY
(AppointmentID) REFERENCES Appointment(AppointmentID);
ALTER TABLE Appointment_ApptType ADD CONSTRAINT FK_Appt_Appt_Type_ID FOREIGN KEY
(Appt_Type_ID) REFERENCES AppointmentType(Appt_Type_ID);

INSERT INTO Department (DeptID, Dept_Name, Capacity) 
	VALUES (1, "Cancer",40);

INSERT INTO Department (DeptID, Dept_Name, Capacity) 
	VALUES (2, "Flu",40);

INSERT INTO Doctor (DoctorID, First, Last, SSN, Gender, DateOfBirth, Start_Date, Patient_ID, Dept_ID) 
	VALUES (123456, "John","Doe", 123456, "M", '1990-02-15', '2000-04-20',654321, 1 );

INSERT INTO Doctor (DoctorID, First, Last, SSN, Gender, DateOfBirth, Start_Date, Patient_ID, Dept_ID) 
	VALUES (123457, "Jim","Deer", 123457, "M", '1990-02-15', '2000-04-20',654323, 1 );
    
INSERT INTO Doctor (DoctorID, First, Last, SSN, Gender, DateOfBirth, Start_Date, Patient_ID, Dept_ID) 
	VALUES (123458, "Jorge","Elk", 123458, "M", '1990-02-15', '2000-04-20',654323, 2 );
    
 
 INSERT INTO PATIENT (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID)
	VALUES(654321, "Jane", "Doe", 654321, "F", 0203945,"A","B","C",64081, '1997-04-25', 1);
    
INSERT INTO PATIENT (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID)
	VALUES(654323, "Angad", "Singh", 654324, "F", 0203945,"A","B","C",64081, '1997-04-25', 1);
    
INSERT INTO PATIENT (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID)
	VALUES(123444, "Sweaty", "Palms", 654343, "M", 0203945,"A","B","C",64081, '1997-04-25', 2);
    
UPDATE Patient Set Dept_ID = 2 WHERE PatientID = 123444;

#Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column.  To disable safe mode, toggle the option in Preferences -> SQL Editor and reconnect.

 
SELECT Patient.First, DoctorID, Doctor.First, Doctor.Last, DeptID, Dept_Name FROM Department
	INNER JOIN Doctor
	ON Department.DeptID = Doctor.Dept_ID
    INNER JOIN Patient
    ON Department.DeptID = Patient.Dept_ID
    GROUP BY Patient.First
    HAVING Count(DoctorID) < 10;
    
Select Doctor.First, Doctor.Last, Doctor.DoctorID, COUNT(DoctorID) as Patients
	FROM Patient
    INNER JOIN Department
    INNER JOIN Doctor
	GROUP BY DoctorID, Doctor.First
    HAVING Count(*) < 10;

#Error Code: 1055. Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'hospital.Doctor.First' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by


#Error Code: 1054. Unknown column 'DoctorID' in 'field list'
