<?php
//fetching each entry data using post 
$firstName=$_POST['first_name'];
$lastName=$_POST['last_name'];
$age=$_POST['age'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$position=$_POST['position'];



//Database Connection
$conn=new mysqli('localhost','root','','employee');
  //checking for connection error
if($conn->connect_error)
{
    die('Connection Failed:'.$conn->conn->connect_error);
} 
{
    $result = mysqli_query($conn, "SELECT first_name,last_name FROM employee_details where first_name = '$firstName' and last_name = '$lastName'  ");
    $total = mysqli_num_rows($result);
    if($total==0)  
   {
    $stmt=$conn->prepare("insert into employee_details(first_name,last_name,age,address,phone,position) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssisis",$firstName,$lastName,$age,$address,$phone,$position);
    $stmt->execute();
    echo "Employee Added Successfully";
    $stmt->close();
   }
   else{
   echo "Employee Already Exists";
   }
}


$conn->close();

?>