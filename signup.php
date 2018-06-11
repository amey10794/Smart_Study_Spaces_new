<?php
session_start();
print_r($_POST);
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$mem=$_POST['mem'];
$org=$_POST['org'];
$servername="localhost";
$username="root";
$passworddb="";
$_SESSION["firstname"]=$firstname;
$_SESSION["lastname"]=$lastname;
$_SESSION["email"]=$email;
$_SESSION["mem"]=$mem;
$_SESSION["signedin"]="YES";
$connection=new mysqli($servername,$username,$passworddb);
//Making connection
if($connection->connect_error){
    
    die("Connection failed:". $connection->connect_error);
}else{
    echo "Connection Succesful";
}
//Creating Database
$que= "CREATE DATABASE IF NOT EXISTS smartStudyDB";
echo "<br/>";
if($connection->query($que)===TRUE){
    echo "smartStudyDB created succesfully";
}
$connection=new mysqli($servername,$username,$passworddb,'smartStudyDB');
//Making connection
if($connection->connect_error){
    
    die("Connection failed:". $connection->connect_error);
}else{
    echo "Connection Succesful";
}

//Userstable
$que="CREATE TABLE IF NOT EXISTS Userstable(
uid int UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
firstname varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
password varchar(50) NOT NULL,
email varchar(50) NOT NULL,
college_company varchar(50),
membership_id INT,
reg_date TIMESTAMP

)";
echo "<br/>";
if($connection->query($que)===TRUE){
    echo "Userstable created succesfully";
}else{
    echo $connection->error."this is table creation error";
}
//entries

$que = "INSERT INTO Userstable (firstname, lastname, email,password,college_company,membership_id)
VALUES ('$firstname', '$lastname', '$email', '$password','$org','$mem')";

echo "<br/>";
if($connection->query($que)===TRUE){
    echo "Inserted data succesfully";
}else{
    echo $connection->error;
}


header("Location:http://localhost/sigfox/demo.php");

?>