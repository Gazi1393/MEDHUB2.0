<?php
$con = mysqli_connect('127.0.0.1','root','', 'patientinfo');

if (!$con){
  echo 'Cannot find connection';
}
if(!mysqli_select_db($con,'patientinfo'))
{
  echo 'Cannot find Database';
}






$Nid =$_POST['NID'];
$FirstName =$_POST['FirstName'];
$LastName =$_POST['LastName'] ;
$sex = $_POST['Sex'];
$BloodGroup = $_POST['BLOOD_GROUP'];
$Occupation = $_POST['OCCUPATION'] ;
$DOB = $_POST ['DOB'];
$PhoneNo = $_POST['PhoneNo'];
$EmergencyNo= $_POST['EmergencyNo'];
$Diseases = $_POST['diseases'];
$Allergies = $_POST['allergy'];
$PatientCon = $_POST['PatientCon'];

$sql = "INSERT INTO information (NID,FirstName,LastName,sex,BLOODGROUP,Occupation,DOB,Phone_No,Emergency_No,
    Diseases,Allergies,PCondition) VALUES ('$Nid','$FirstName','$LastName','$sex','$BloodGroup','$Occupation','$DOB',
      '$PhoneNo','$EmergencyNo','$Diseases','$Allergies','$PatientCon')"  ;



      if(!mysqli_query($con,$sql))
{
  printf("error: %s\n", mysqli_error($con));
}
else
{
  echo 'Successful';
}
header("refresh:3; url=addPatient.html");

?>
